<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
         $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil ID user yang login
        $userId = Auth::id(); // atau auth()->id()

        // Misalnya, redirect ke dashboard dengan ID
        return redirect()->route('dashboard')->with('user_id', $userId);
    }
    return back()->withErrors([
        'email' => 'Invalid credentials',
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

