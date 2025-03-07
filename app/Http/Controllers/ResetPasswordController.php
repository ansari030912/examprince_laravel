<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class ResetPasswordController extends Controller
{
    /**
     * Display the reset password form.
     */
    public function showResetForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        if (!$email || !$token) {
            return redirect('/forgot-password')->withErrors([
                'reset' => 'Invalid password reset link.'
            ]);
        }

        if ($request->cookie('loginResponse')) {
            // If the cookie exists, redirect to the home page
            return redirect('/');
        }

        return view('reset_password', compact('email', 'token'));
    }

    /**
     * Handle the reset password form submission.
     */
    public function reset(Request $request)
    {
        // Validate input including the custom password regex.
        $request->validate([
            'email' => 'required|email',
            'new_password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'confirm_password' => 'required|same:new_password',
            'token' => 'required'
        ], [
            'new_password.regex' => 'Password must have at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.'
        ]);

        // Prepare the payload to send to the reset password API.
        $payload = [
            'email' => $request->input('email'),
            'new_password' => $request->input('new_password'),
            'reset_token' => $request->input('token')
        ];

        // API endpoint and API key (ensure these are correctly set in your configuration).
        $apiUrl = 'https://certsgang.com/v1/account/reset-password';
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

            // Updated logging line to ensure the context is always an array.
            Log::info('Reset Password API Response: ', is_array($responseData) ? $responseData : ['response' => $responseData]);

            // Check for success (the API may return a boolean true or a success flag)
            if ($responseData === true || (isset($responseData['success']) && $responseData['success'] == true)) {
                return redirect('/login')->with('message', 'Password reset successfully!');
            } else {
                return redirect()->back()->withErrors([
                    'reset' => $responseData['message'] ?? 'Reset link has expired or is invalid.'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Reset Password API Error: ' . $e->getMessage());
            return redirect()->back()->withErrors([
                'reset' => 'Something went wrong. Please try again later.'
            ]);
        }
    }
}
