<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class AccountController extends Controller
{
    public function setup()
    {
        // Metode ini akan menampilkan view dari Langkah 1
        return view('account-setup');
    }

    public function success()
    {
        // Ganti kode di dalam metode ini
        $user = Auth::user();

        // Pengaman jika halaman diakses tanpa login
        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil nama depan dari user yang login
        // Pastikan nama kolom di database Anda 'first_name' atau sesuaikan
        $firstName = $user->first_name ?? 'there'; 

        // Kirim nama ke view 'account-success'
        return view('account-success', compact('firstName'));
    }
}