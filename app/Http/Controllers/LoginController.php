<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // berdasarkan username sm ip
        $throttleKey = Str::lower($request->input('username')) . '|' . $request->ip();

        // klo dh ga kena login throlling
        if (!RateLimiter::tooManyAttempts($throttleKey, 5)) {
        } else {
            // klo msh kena
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'username' => "Too many login attempts. Please try again in $seconds seconds.",
            ]);
        }


        // validasi type data
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        // cek dicentang apa ga
        $remember = $request->has('remember');


        // titik autentikasi
        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        RateLimiter::hit($throttleKey, 60);

        return back()->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
