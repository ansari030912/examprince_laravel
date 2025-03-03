<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Logout user and remove loginResponse cookie.
     */
    public function logout(Request $request)
    {
        // Remove the loginResponse cookie
        Cookie::queue(Cookie::forget('loginResponse'));

        // Optionally, perform additional logout logic (e.g., session invalidation)
        auth()->logout();

        // Redirect to login page or homepage
        return redirect('/')->with('message', 'You have been logged out successfully.');
    }
}
