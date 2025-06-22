<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User; // <-- INI DIA PERBAIKANNYA

class RegisterController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    public function handleStep1(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        $request->session()->put('registration_data', $validated);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('register.step1');
        }
        return view('auth.register-step2');
    }
    
    public function handleStep2(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $step1Data = session('registration_data');

        if (!$step1Data) {
            return redirect()->route('register.step1')->withErrors(['session' => 'Sesi Anda telah berakhir, silakan mulai lagi.']);
        }
        
        // Gabungkan data dari step 1 dan step 2
        $fullData = array_merge($step1Data, $request->only('email', 'password'));
        
        // Sekarang $user = User::create(...) akan berfungsi
        $user = User::create($fullData);

        $request->session()->forget('registration_data');
        Auth::login($user);
        
        return redirect()->route('community.dashboard-business')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}