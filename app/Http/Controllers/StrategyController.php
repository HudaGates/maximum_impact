<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessGrowth;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // PENTING: Import Carbon

class StrategyController extends Controller
{
    public function index()
    {
        return view('strategy.index');
    }

    public function index1(Request $request) // Tambahkan Request $request
    {
        // 1. Tentukan bulan yang aktif
        // Gunakan bulan dari URL jika ada, jika tidak, gunakan bulan saat ini (dibatasi hingga 6)
        $defaultMonth = min(6, Carbon::now()->month);
    $selectedMonth = $request->input('month', $defaultMonth);

    // 2. INI ADALAH BAGIAN YANG HILANG: AMBIL DATA DARI DATABASE
    // Cari data BusinessGrowth yang cocok dengan user yang login, bulan yang dipilih, dan tahun saat ini.
    $businessGrowthData = BusinessGrowth::where('user_id', Auth::id())
                                      ->where('month', $selectedMonth)
                                      ->where('year', Carbon::now()->year)
                                      ->first(); // Gunakan first() untuk mendapatkan satu hasil atau null

    // 3. Siapkan data lain yang dibutuhkan oleh view (jika masih dipakai)
    // Data statis ini bisa Anda hapus jika kartu sudah sepenuhnya dinamis
    $cards = [ /* ... data kartu statis Anda ... */ ];
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
    $profits = [10, 20, 12, 18, 22, 30];

    // 4. Kirim SEMUA variabel yang dibutuhkan ke view
    return view('strategy.strategy', [
        'cards' => $cards, // Jika masih dipakai
        'months' => $months,
        'profits' => $profits,
        'selectedMonth' => $selectedMonth,
        'businessGrowthData' => $businessGrowthData // <-- VARIABEL INI SEKARANG DIKIRIM
    ]);
    }

    public function storeStrategy(Request $request)
    {
        // ... method ini tidak perlu diubah ...
        $request->validate([]);

        return redirect()->route('strategy.strategy')->with('success', 'Strategy has been saved successfully!');
    }
}