<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function showLoginForm(Request $request)
    {
        if ($request->cookie('loginResponse')) {
            // If the cookie exists, redirect to the home page
            return redirect('/');
        }
        return view('login');
    }

    /**
     * Handle login form submission.
     */
    public function login(Request $request)
    {
        // Validate input similar to the React code validations
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Get client IP (check headers then fallback to request->ip())
        $clientIp = $request->header('cf-connecting-ip')
            ?? $request->header('x-forwarded-for')
            ?? $request->ip();

        // Log the client IP
        Log::info('Client IP: ' . $clientIp);

        // Prepare data to send to the API
        $payload = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'ip' => $clientIp,
        ];

        // API URL and API key from configuration (ensure these are set correctly in your config or .env file)
        $apiUrl = 'https://certsgang.com/v1/account/login';
        $apiKey = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';

        $client = new Client();
        try {
            $response = $client->post($apiUrl, [
                'json' => $payload,
                'headers' => [
                    'x-api-key' => $apiKey,
                ],
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);

            // Log the API response
            Log::info('API Response: ', $responseData);

            // If login successful then set a cookie (expires in 120 minutes / 2 hours)
            if (isset($responseData['is_logged_in']) && $responseData['is_logged_in']) {
                $cookie = cookie('loginResponse', json_encode($responseData), 120);
                return redirect('/')->withCookie($cookie);
            } else {
                // If login fails, redirect back with an error message
                return redirect()->back()->withErrors([
                    'login' => $responseData['message'] ?? 'Login failed. Please try again.',
                ]);
            }
        } catch (\Exception $e) {
            // Log the error details
            Log::error('Login API Error: ' . $e->getMessage());

            return redirect()->back()->withErrors([
                'login' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
}
