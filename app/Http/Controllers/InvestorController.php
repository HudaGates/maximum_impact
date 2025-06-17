<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        // Contoh data statis yang bisa diganti dengan data dari database nanti
        $investors = [
            [
                'name' => 'Lion Bird',
                'contacts' => 179,
                'investment' => '1,176',
                'location' => 'New York',
                'description' => 'Lorem ipsum dolor sit amet',
                'departments' => 'Engineering, Finance, HR',
                'logo' => 'images/lion.png'
            ],
            // Tambahkan lebih banyak investor jika perlu
        ];

        return view('community.find-investor', compact('investors'));
    }
    public function findInvestor()
{
    $investors = [
        ['name' => 'Tesla Motor', 'contacts' => 179, 'investments' => 1176, 'location' => 'New York', 'departments' => ['Engineering', 'Finance', 'HR']],
        ['name' => 'Tesla', 'contacts' => 179, 'investments' => 1176, 'location' => 'New York', 'departments' => ['Engineering', 'Finance', 'HR']],
    ];

    return view('community.find-investor-2', compact('investors'));
}

public function show($id)
{
    // Data dummy untuk ditampilkan (bisa diganti dari DB)
    $investor = [
        'name' => 'Djoko Susanto',
        'company' => 'PT Sumber Alfaria Trijaya Tbk',
        'logo' => 'images/lion.png',
        'total_investment' => '$3 Million',
    ];

    $investments = [
        ['company' => 'Tech Innovations', 'industry' => 'Software', 'stage' => 'Series A', 'amount' => '$2 Million', 'year' => 2021],
        ['company' => 'Green Energy Corp', 'industry' => 'Renewable Energy', 'stage' => 'Seed', 'amount' => '$1.5 Million', 'year' => 2020],
        ['company' => 'Tech Innovations', 'industry' => 'Software', 'stage' => 'Series A', 'amount' => '$2 Million', 'year' => 2021],
        ['company' => 'HealthTech Solutions', 'industry' => 'Health Care', 'stage' => 'Series B', 'amount' => '$3 Million', 'year' => 2022],
    ];

    return view('community.investor-profile', compact('investor', 'investments'));
}


}
