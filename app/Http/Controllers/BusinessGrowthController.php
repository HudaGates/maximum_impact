<?php

namespace App\Http\Controllers;

use App\Models\BusinessGrowth; // Import model yang benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login
use Carbon\Carbon; // Untuk mendapatkan tahun saat ini

class BusinessGrowthController extends Controller
{
    /**
     * Fungsi private untuk mengambil data BusinessGrowth yang ada
     * untuk user, bulan, dan tahun tertentu.
     */
    private function getGrowthData($month)
    {
        // Pastikan bulan adalah angka yang valid sebelum melakukan query
        if (!is_numeric($month)) {
            return null;
        }

        return BusinessGrowth::where('user_id', Auth::id())
                                ->where('month', $month)
                                ->where('year', Carbon::now()->year)
                                ->first(); // first() karena kita hanya mengharapkan satu entri per bulan
    }

    /**
     * Fungsi private untuk menyimpan atau memperbarui data
     * menggunakan 'updateOrCreate' yang efisien.
     */
    private function storeOrUpdateData(Request $request, array $dataToStore)
    {
        // Validasi bahwa 'month' ada dan merupakan angka
        $validated = $request->validate([
            'month' => 'required|integer|between:1,12'
        ]);

        BusinessGrowth::updateOrCreate(
            [
                // Kriteria untuk MENCARI record
                'user_id' => Auth::id(),
                'month'   => $validated['month'],
                'year'    => Carbon::now()->year,
            ],
            // Data untuk DISIMPAN (jika tidak ditemukan) atau DIPERBARUI (jika ditemukan)
            $dataToStore
        );
    }

    // --- FUNGSI UNTUK MENAMPILKAN HALAMAN FORM (VIEWS) ---
    // Setiap fungsi 'show' sekarang mengambil bulan dari URL dan mencari data yang sudah ada.

    public function showStep1(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth1', ['month' => $month, 'data' => $data]);
    }

    public function showStep2(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth2', ['month' => $month, 'data' => $data]);
    }

    public function showStep3(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth3', ['month' => $month, 'data' => $data]);
    }

    public function showStep4(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth4', ['month' => $month, 'data' => $data]);
    }

    public function showStep5(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth5', ['month' => $month, 'data' => $data]);
    }
    
    // Halaman transisi, hanya meneruskan bulan
    public function showStep6(Request $request) {
        return view('myproject.bussines-growth6', ['month' => $request->query('month')]);
    }

    public function showStep7(Request $request) {
        $month = $request->query('month');
        $data = $this->getGrowthData($month);
        return view('myproject.bussines-growth7', ['month' => $month, 'data' => $data]);
    }

    public function showStep8(Request $request) {
        // Halaman "Selesai", hanya meneruskan bulan untuk tombol 'Back to Dashboard'
        return view('myproject.bussines-growth8', ['month' => $request->query('month')]);
    }

    // --- FUNGSI UNTUK MEMPROSES DATA FORM (STORE) ---
    // Setiap fungsi 'store' sekarang memanggil helper 'storeOrUpdateData'.
    
    public function storeStep1(Request $request)
    {
        $this->storeOrUpdateData($request, ['goals' => $request->input('goals')]);
        return redirect()->route('business-growth.step2.show', ['month' => $request->month]);
    }

    public function storeStep2(Request $request)
    {
        $this->storeOrUpdateData($request, ['revenue_target' => $request->input('revenue_target')]);
        return redirect()->route('business-growth.step3.show', ['month' => $request->month]);
    }

    public function storeStep3(Request $request)
    {
        $this->storeOrUpdateData($request, ['profit_target' => $request->input('profit_target')]);
        return redirect()->route('business-growth.step4.show', ['month' => $request->month]);
    }

    public function storeStep4(Request $request)
    {
        $this->storeOrUpdateData($request, ['team_dev_target' => $request->input('team_dev_target')]);
        return redirect()->route('business-growth.step5.show', ['month' => $request->month]);
    }
    
    public function storeStep5(Request $request)
    {
        $this->storeOrUpdateData($request, ['social_impact_target' => $request->input('social_impact_target')]);
        // Arahkan ke halaman transisi (step 6)
        return redirect()->route('business-growth.step6.show', ['month' => $request->month]);
    }
    
    // Tidak ada storeStep6 karena itu hanya halaman transisi
    
    public function storeStep7(Request $request)
    {
        $this->storeOrUpdateData($request, ['strategy' => $request->input('strategy')]);
        // Setelah langkah terakhir, arahkan ke halaman "Selesai" (step 8)
        return redirect()->route('business-growth.step8.show', ['month' => $request->month]);
    }
}