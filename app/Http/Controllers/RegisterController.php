<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     */
    public function showRegisterForm(Request $request)
    {
        if ($request->cookie('loginResponse')) {
            // If the cookie exists, redirect to the home page
            return redirect('/');
        }
        return view('register'); // Ensure the Blade view exists at resources/views/register.blade.php
    }

    /**
     * Handle registration form submission.
     */
    public function register(Request $request)
    {
        // Validate required fields and that confirm_password matches password
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ], [
            'confirm_password.same' => 'Passwords do not match.',
        ]);

        // Custom password regex validation (at least one digit, one lowercase, one uppercase, one special character, minimum 8 characters)
        $password = $request->input('password');
        $passwordRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z\d\W]).{8,}$/';
        if (!preg_match($passwordRegex, $password)) {
            return redirect()->back()->withErrors([
                'password' => 'Password must have 8 characters (1 uppercase, lowercase, number, and one special character).',
            ])->withInput();
        }

        // Get client IP from headers or fallback
        $clientIp = $request->header('cf-connecting-ip')
            ?? $request->header('x-forwarded-for')
            ?? $request->ip();
        Log::info('Client IP: ' . $clientIp);

        // Prepare payload for the API
        $payload = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'ip' => $clientIp,
        ];

        // API URL and API key (set in your configuration)
        $apiUrl = config('services.api.base_url') . '/v1/account/register';
        $apiKey = config('services.api.key');

        $client = new Client();

        try {
            $response = $client->post($apiUrl, [
                'json' => $payload,
                'headers' => [
                    'x-api-key' => $apiKey,
                ],
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response: ', $responseData);

            // Check if registration is successful (is_active true)
            if (isset($responseData['is_active']) && $responseData['is_active'] === true) {
                // Registration successful; redirect to login with success message
                return redirect()->route('login')->with('success', $responseData['message'] ?? 'Registration successful. Please login.');
            } else {
                // Registration failed; send error message back
                return redirect()->back()->withErrors([
                    'register' => $responseData['message'] ?? 'Registration failed. Please try again.',
                ])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Register API Error: ' . $e->getMessage());
            return redirect()->back()->withErrors([
                'register' => 'Something went wrong. Please try again later.',
            ])->withInput();
        }
    }
}
