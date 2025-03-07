<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the loginResponse from cookies (assumed JSON‑encoded)
        $loginResponseCookie = $request->cookie('loginResponse');
        if (!$loginResponseCookie) {
            return redirect('/login')->withErrors(['login' => 'Please log in to view your invoices.']);
        }

        $loginResponse = json_decode($loginResponseCookie, true);
        $token = $loginResponse['_token'] ?? null;
        if (!$token) {
            return redirect('/login')->withErrors(['login' => 'Invalid login response.']);
        }

        $client = new Client();
        $apiUrl = 'https://certsgang.com/v1/account/invoices';
        $apiKey = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';

        try {
            $response = $client->get($apiUrl, [
                'headers' => [
                    'x-api-key' => $apiKey,
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            // Assuming the API returns an array of invoices
            $invoices = $data;
        } catch (\Exception $e) {
            Log::error('Invoice API error: ' . $e->getMessage());
            $invoices = [];
        }

        return view('profile.invoices', compact('invoices'));
    }
}
