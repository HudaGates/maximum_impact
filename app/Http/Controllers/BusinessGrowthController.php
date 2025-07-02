<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessGrowth;

class BusinessGrowthController extends Controller
{
    // --- FUNGSI UNTUK MENAMPILKAN HALAMAN (VIEW) ---
    // Tidak ada perubahan di sini
    public function showStep1() { return view('myproject.bussines-growth1'); }
    public function showStep2() { return view('myproject.bussines-growth2'); }
    public function showStep3() { return view('myproject.bussines-growth3'); }
    public function showStep4() { return view('myproject.bussines-growth4'); }
    public function showStep5() { return view('myproject.bussines-growth5'); }
    public function showStep6() { return view('myproject.bussines-growth6'); }
    public function showStep7() { return view('myproject.bussines-growth7'); }
    public function showStep8() { return view('myproject.bussines-growth8'); }

    // --- FUNGSI UNTUK MENYIMPAN DATA (STORE) ---

    // Fungsi helper untuk mencari data di session atau membuat entri baru
    private function findOrCreate(Request $request)
    {
        $id = $request->session()->get('business_growth_id');
        // findOrNew() akan mencari ID, jika tidak ada, ia akan membuat instance model baru
        return BusinessGrowth::findOrNew($id);
    }

    // Menyimpan data dari view: bussines-growth1.blade.php
    public function storeStep1(Request $request)
    {
        $growth = BusinessGrowth::create([
            'goals_month_1' => $request->input('goals_month_1')
        ]);
        $request->session()->put('business_growth_id', $growth->id);
        return redirect()->route('bussines-growth2-page');
    }

    // Menyimpan data dari view: bussines-growth2.blade.php
    public function storeStep2(Request $request)
    {
        $growth = $this->findOrCreate($request);
        $growth->revenue_target_month_2 = $request->input('revenue_target_month_2');
        $growth->save();
        return redirect()->route('bussines-growth3-page');
    }

    // Menyimpan data dari view: bussines-growth3.blade.php
    public function storeStep3(Request $request)
    {
        $growth = $this->findOrCreate($request);
        $growth->profit_target_month_1 = $request->input('profit_target_month_1');
        $growth->save();
        return redirect()->route('bussines-growth4-page');
    }

    // Menyimpan data dari view: bussines-growth4.blade.php
    public function storeStep4(Request $request)
    {
        $growth = $this->findOrCreate($request);
        $growth->team_dev_target_month_1 = $request->input('team_dev_target_month_1');
        $growth->save();
        return redirect()->route('bussines-growth5-page');
    }
    
    // Menyimpan data dari view: bussines-growth5.blade.php
    public function storeStep5(Request $request)
    {
        $growth = $this->findOrCreate($request);
        $growth->social_impact_target_month_1 = $request->input('social_impact_target_month_1');
        $growth->save();
        return redirect()->route('bussines-growth6-page');
    }
    
    // Menyimpan data dari view: bussines-growth7.blade.php
    public function storeStep7(Request $request)
    {
        $growth = $this->findOrCreate($request);
        $growth->strategy_month_1 = $request->input('strategy_month_1');
        $growth->save();

        // Hapus session ID setelah langkah terakhir
        $request->session()->forget('business_growth_id');
        
        return redirect()->route('bussines-growth8-page');
    }


    public function step8(Request $request)
{
    $month1 = $request->input('month1');
    
    return redirect()->route('bussines-growth8-page');
}

}

}

