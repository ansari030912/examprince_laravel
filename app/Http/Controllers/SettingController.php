<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    /**
     * Display the settings form.
     */
    public function showSettings(Request $request)
    {
        // Retrieve the loginResponse from a cookie (assumed to be JSON‑encoded)
        $loginResponseCookie = $request->cookie('loginResponse');
        if (!$loginResponseCookie) {
            return redirect('/login')->withErrors(['login' => 'Please log in to update your settings.']);
        }

        $loginResponse = json_decode($loginResponseCookie, true);

        // Pass the login data to the view (for example, the user's name)
        return view('profile.settings', ['user' => $loginResponse]);
    }

    /**
     * Handle the update password form submission.
     */
    public function updatePassword(Request $request)
    {
        // Validate inputs
        $request->validate([
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
        ], [
            'password.min' => 'Password must be at least 8 characters long.',
            'confirmPassword.same' => 'Passwords do not match.',
        ]);

        // Retrieve the loginResponse from a cookie
        $loginResponseCookie = $request->cookie('loginResponse');
        if (!$loginResponseCookie) {
            return redirect('/login')->withErrors(['login' => 'Please log in to update your settings.']);
        }

        $loginResponse = json_decode($loginResponseCookie, true);
        $token = $loginResponse['_token'] ?? null;
        if (!$token) {
            return redirect('/login')->withErrors(['login' => 'Invalid login response.']);
        }

        // Prepare the API call to update profile
        $client = new Client();
        $apiUrl = 'https://certsgang.com/v1/account/update-profile';
        $apiKey = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';

        try {
            $response = $client->post($apiUrl, [
                'json' => [
                    'name' => $loginResponse['name'] ?? '',
                    'password' => $request->input('password'),
                ],
                'headers' => [
                    'x-api-key' => $apiKey,
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            // Decode API response
            $responseData = json_decode($response->getBody()->getContents(), true);

            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            Log::error('Update Profile API error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['update' => 'Something went wrong. Please try again later.']);
        }
    }
}
