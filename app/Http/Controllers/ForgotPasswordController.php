<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /**
     * Display the forgot password form.
     */
    public function showForgotForm(Request $request)
    {
        if ($request->cookie('loginResponse')) {
            // If the cookie exists, redirect to the home page
            return redirect('/');
        }
        return view('forgot_password');
    }

    /**
     * Handle the forgot password form submission.
     */
    public function forgot(Request $request)
    {
        // Validate the email field
        $request->validate([
            'email' => 'required|email',
        ]);

        // Determine client IP using headers or fallback to request IP
        $clientIp = $request->header('cf-connecting-ip')
            ?? $request->header('x-forwarded-for')
            ?? $request->ip();

        // Prepare the payload to send to the API
        $payload = [
            'email' => $request->input('email'),
            'ip' => $clientIp,
            'reset_url' => "/reset-password/",
        ];

        // API endpoint and API key
        $apiUrl = 'https://certsgang.com/v1/account/forgot-password';
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

            // Log the API response for debugging
            Log::info('Forgot Password API Response: ', $responseData);

            // Return back with the message from the API
            if (isset($responseData['message'])) {
                return redirect()->back()->with('message', $responseData['message']);
            } else {
                return redirect()->back()->withErrors([
                    'forgot' => 'Unexpected API response. Please try again.',
                ]);
            }
        } catch (\Exception $e) {
            // Log error details
            Log::error('Forgot Password API Error: ' . $e->getMessage());
            return redirect()->back()->withErrors([
                'forgot' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
}
