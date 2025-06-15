<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function approve()
    {
        $investment = [
            (object)[
                'id' => 1,
                'company_name' => 'Tech Innovations',
                'amount' => 100000,
                'investment_date' => '2019-10-17',
                'investment_type' => 'Real Estate',
            ],
            (object)[
                'id' => 2,
                'company_name' => 'Green Energy Corp',
                'amount' => 90000000,
                'investment_date' => '2019-10-22',
                'investment_type' => 'Venture Capital',
            ],
            (object)[
                'id' => 3,
                'company_name' => 'Tech Innovations',
                'amount' => 1000000,
                'investment_date' => '2020-09-08',
                'investment_type' => 'Venture Capital',
            ],
            (object)[
                'id' => 4,
                'company_name' => 'HealthTech Solutions',
                'amount' => 80000,
                'investment_date' => '2020-02-01',
                'investment_type' => 'Venture Capital',
            ],
        ];

        return view('investment.approve', compact('investment'));
    }

    public function show($id)
    {
        // Placeholder for detail page
        return "Detail for investment ID: $id";
    }
    public function status()
    {
        $investments = [
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Seed',
                'investment_type' => 'Real Estate',
                'sender' => 'Claire',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'approved',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Unknown',
                'investment_type' => 'Venture Capital',
                'sender' => 'Audrey',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'approved',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Seed',
                'investment_type' => 'Venture Capital',
                'sender' => 'Claire',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'rejected',
            ],
            (object)[
                'investor' => 'Synkode',
                'amount' => 100000,
                'date' => '2024-10-22',
                'funding_type' => 'Unknown',
                'investment_type' => 'Venture Capital',
                'sender' => 'Audrey',
                'origin_bank' => 'BNI',
                'destination_bank' => 'Mandiri',
                'status' => 'rejected',
            ],
        ];

        return view('investment.status', compact('investments'));
}
}