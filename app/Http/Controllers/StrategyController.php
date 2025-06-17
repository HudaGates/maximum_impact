<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrategyController extends Controller
{
    public function index()
    {
        return view('strategy.index');
    }
    public function index1()
    {
        // Contoh data dummy (bisa diganti dengan query database nanti)
        $cards = [
            [
                'title' => 'Business Growth',
                'desc' => 'Bringing together skills training and support for women to start or expand their own businesses',
                'date' => 'May 2024',
                'location' => 'DKI Jakarta'
            ],
            [
                'title' => 'Revenue',
                'desc' => 'Bringing together skills training and support for women to start or expand their own businesses',
                'date' => 'May 2024',
                'location' => 'DKI Jakarta'
            ],
            [
                'title' => 'Team Development',
                'desc' => 'Bringing together skills training and support for women to start or expand their own businesses',
                'date' => 'May 2024',
                'location' => 'DKI Jakarta'
            ],
            [
                'title' => 'Impact',
                'desc' => 'Enabling farmers and producers to access broader markets while boosting local economic growth.',
                'date' => 'October 2024',
                'location' => 'East Java'
            ]
        ];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $profits = [10, 20, 12, 18, 22, 30]; // contoh data dalam juta

        return view('strategy.strategy', compact('cards', 'months', 'profits'));
    }
}
