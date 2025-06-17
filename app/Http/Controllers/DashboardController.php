<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // (Opsional) Kirim data dari database
        return view('community.dashboard-business');
    }
    public function indexInvest()
    {
        $stats = [
        'projects' => 312,
        'companies' => 50,
        'investment' => '$20M+',
    ];
        // Jika ada data dari database, bisa dikirim di sini
        return view('community.dashboard-invest', compact('stats'));
    }
}
