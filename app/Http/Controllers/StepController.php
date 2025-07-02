<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
    /**
     * Helper function untuk mengambil data bisnis atau membuat instance baru.
     * Ini untuk menghindari pengulangan kode.
     */
    private function getBusiness()
    {
        return Business::firstOrNew(['user_id' => Auth::id()]);
    }

    // --- STEP 1: Business Name ---
    public function showStep1()
    {
        return view('step.step1', ['business' => $this->getBusiness()]);
    }

    public function submitStep1(Request $request)
    {
        $validated = $request->validate(['business_name' => 'required|string|max:255']);
        
        $user = Auth::user();
        $userNameToStore = $user->name ?? explode('@', $user->email)[0];

        Business::updateOrCreate(
            ['user_id' => $user->id],
            [
                'business_name' => $validated['business_name'],
                'user_name' => $userNameToStore,
                'user_email' => $user->email,
            ]
        );
        return redirect()->route('step2');
    }

    // --- STEP 2: Industry ---
    public function showStep2()
    {
        return view('step.step2', ['business' => $this->getBusiness()]);
    }

    public function submitStep2(Request $request)
    {
        $validated = $request->validate(['industry' => 'required|string|max:255']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step3');
    }

    // --- STEP 3: Growth Plan ---
    public function showStep3()
    {
        return view('step.step3', ['business' => $this->getBusiness()]);
    }

    public function submitStep3(Request $request)
    {
        $validated = $request->validate(['growth_plan' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step4');
    }

    // --- STEP 4: Ambition Plan ---
    public function showStep4()
    {
        return view('step.step4', ['business' => $this->getBusiness()]);
    }

    public function submitStep4(Request $request)
    {
        $validated = $request->validate(['ambition_plan' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step5');
    }

    // --- STEP 5: Profit Goal ---
    public function showStep5()
    {
        return view('step.step5', ['business' => $this->getBusiness()]);
    }

    public function submitStep5(Request $request)
    {
        $validated = $request->validate(['profit_goal' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step6');
    }

    // --- STEP 6: Team Plan ---
    public function showStep6()
    {
        return view('step.step6', ['business' => $this->getBusiness()]);
    }

    public function submitStep6(Request $request)
    {
        $validated = $request->validate(['team_plan' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step7');
    }

    // --- STEP 7: SDG Goal ---
    public function showStep7()
    {
        return view('step.step7', ['business' => $this->getBusiness()]);
    }

    public function submitStep7(Request $request)
    {
        $validated = $request->validate(['sdg_goal' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step8');
    }

    // --- STEP 8: Battle Plan ---
    public function showStep8()
    {
        return view('step.step8', ['business' => $this->getBusiness()]);
    }

    public function submitStep8(Request $request)
    {
        $validated = $request->validate(['battle_plan' => 'required|string']);
        Business::updateOrCreate(['user_id' => Auth::id()], $validated);
        return redirect()->route('step9');
    }

    // --- STEP 9 (Halaman Konfirmasi, tidak ada data untuk disimpan) ---
    public function showStep9()
    {
        $proof = 'Receipt #001'; // Contoh
        return view('step.step9', compact('proof'));
    }

    public function submitStep9(Request $request)
    {
        // Proses sudah selesai, arahkan ke halaman akhir
        return redirect()->route('account.setup');
    }

    // --- Halaman Akhir ---
    public function showAccountSetup()
    {
        return view('account-setup');
    }
}