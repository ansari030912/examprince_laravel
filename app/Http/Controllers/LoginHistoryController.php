<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class LoginHistoryController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve loginResponse from cookies (assumed JSON-encoded)
        $loginResponseCookie = $request->cookie('loginResponse');
        if (!$loginResponseCookie) {
            return redirect('/login')->withErrors(['login' => 'Please log in to view your history.']);
        }

        $loginResponse = json_decode($loginResponseCookie, true);
        $token = $loginResponse['_token'] ?? null;
        if (!$token) {
            return redirect('/login')->withErrors(['login' => 'Invalid login response.']);
        }

        $client = new Client();
        $apiUrl = 'https://certsgang.com/v1/account/login-history';
        $apiKey = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';

        try {
            $response = $client->get($apiUrl, [
                'headers' => [
                    'x-api-key' => $apiKey,
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);
            $body = $response->getBody()->getContents();
            $json = json_decode($body, true);
            $data = $json['history'] ?? [];
        } catch (\Exception $e) {
            Log::error('Login History API error: ' . $e->getMessage());
            $data = [];
        }

        // Paginate manually – 5 items per page
        $page = $request->input('page', 1);
        $perPage = 5;
        $offset = ($page - 1) * $perPage;
        $itemsForCurrentPage = array_slice($data, $offset, $perPage);
        $paginator = new LengthAwarePaginator($itemsForCurrentPage, count($data), $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('profile.login_history', compact('paginator'));
    }
}
