<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        $user =Auth::user();

        // Statistik ringkas
        $stats = [
            'projects' => 312,
            'companies' => 50,
            'investment' => '$20M+',
        ];

        // Data dummy untuk Invested Companies
        $company = [
            ['logo' => 'img/tesla.png', 'name' => 'Tesla Motors', 'status' => 'Growth'],
            ['logo' => 'img/adidas.png', 'name' => 'Adidas', 'status' => 'Stable'],
            ['logo' => 'img/apple.png', 'name' => 'Apple Inc.', 'status' => 'Stable'],
            ['logo' => 'img/sberbank.png', 'name' => 'Sberbank Russia', 'status' => 'Decline'],
            ['logo' => 'img/microsoft.png', 'name' => 'Microsoft', 'status' => 'Growth'],
            ['logo' => 'img/sberbankrusia.png', 'name' => 'Sberbank Rusia', 'status' => 'Decline'],
            ['logo' => 'img/appleinc.png', 'name' => 'Apple inc.', 'status' => 'Decline'],
        ];

        // Data dummy untuk Recent Transactions
        $txn = [
            ['date' => '2024-10-11', 'company' => 'Globex Corporation', 'amount' => '$25,000'],
            ['date' => '2024-10-11', 'company' => 'Initech', 'amount' => '$125,000'],
            ['date' => '2024-10-11', 'company' => 'Bluth Company', 'amount' => '$245,000'],
            ['date' => '2024-10-11', 'company' => 'Hooli', 'amount' => '$2,125,000'],
            ['date' => '2024-10-11', 'company' => 'Vehement Capital', 'amount' => '$200,000'],
            ['date' => '2024-10-11', 'company' => 'Massive Dynamic', 'amount' => '$1,345,678'],
            ['date' => '2024-10-11', 'company' => 'DOSE Yearly Invest.', 'amount' => '$3,000,000'],
        ];
        
        // Kirim semua data ke Blade
        return view('community.dashboard-invest', compact('user','stats', 'company', 'txn'));
    }
}
