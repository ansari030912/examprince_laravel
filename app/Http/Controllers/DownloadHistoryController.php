<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class DownloadHistoryController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the loginResponse from cookies (assumed to be JSON encoded)
        $loginResponseCookie = $request->cookie('loginResponse');
        if (!$loginResponseCookie) {
            // Redirect to login if not available
            return redirect('/login')->withErrors(['login' => 'Please log in to access this page']);
        }

        $loginResponse = json_decode($loginResponseCookie, true);
        $token = $loginResponse['_token'] ?? null;
        if (!$token) {
            return redirect('/login')->withErrors(['login' => 'Invalid login response']);
        }

        $apiUrl = 'https://certsgang.com/v1/account/download-history';
        $apiKey = 'b46279cb-13bb-4445-a6f9-6f252b61ae79';

        $client = new Client();
        try {
            $response = $client->get($apiUrl, [
                'headers' => [
                    'x-api-key' => $apiKey,
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);
            $body = $response->getBody()->getContents();
            $json = json_decode($body, true);
            $data = $json['history'] ?? [];
        } catch (\Exception $e) {
            Log::error('DownloadHistoryController index error: ' . $e->getMessage());
            $data = [];
        }

        // Paginate the results manually (5 items per page)
        $page = $request->input('page', 1);
        $perPage = 5;
        $offset = ($page - 1) * $perPage;
        $itemsForCurrentPage = array_slice($data, $offset, $perPage);
        $paginator = new LengthAwarePaginator($itemsForCurrentPage, count($data), $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('profile.download_history', compact('paginator'));
    }
}
