<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;



class RegisterController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    public function handleStep1(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        // Simpan ke session
        session([
            'register.first_name' => $request['first_name'],
            'register.last_name' => $request['last_name'],
            'register.phone' => $request['phone'],
        ]);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        if (!Session::has('register.first_name')) {
        return redirect()->route('register.step1')->withErrors(['msg' => 'Please complete step 1 first.']);
    }
    return view('auth.register-step2');
    }
    public function handleStep2(Request $request)
    {
        // Tambahkan validasi untuk email dan password
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan data dari session dan form step 2
        $user = User::create([
            'first_name' => Session::get('register.first_name'),
            'last_name' => Session::get('register.last_name'),
            'phone' => Session::get('register.phone'),
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Simpan ke database (asumsi model User ada)
        //\App\Models\User::create($userData);

        // Hapus data dari session
        session()->forget('register');

        // Redirect ke halaman dashboard atau login
        auth()->login($user);
        return redirect()->route('community.dashboard')->with('success', 'Registration successful!');
    }
}
