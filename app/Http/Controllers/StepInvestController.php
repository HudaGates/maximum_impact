<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestorProfile; // <-- Import model InvestorProfile

class StepInvestController extends Controller
{
    // Pola untuk menampilkan halaman step
    private function showStep($viewName)
    {
        $profile = InvestorProfile::firstOrNew(['user_id' => auth()->id()]);
        return view($viewName, ['profile' => $profile]);
    }

    // Pola untuk menyimpan data dari step
    private function submitStep(Request $request, $validationRules, $nextRoute)
    {
        $validatedData = $request->validate($validationRules);

        InvestorProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            $validatedData
        );

        return redirect()->route($nextRoute);
    }

    // --- Step 1 ---
    public function showStep1() { return $this->showStep('step.step-invest.step1-invest'); }
    public function submitStep1(Request $request) {
        return $this->submitStep($request, ['investment_name' => 'required|string|max:255'], 'step-invest.step2-invest');
    }

    // --- Step 2 ---
    public function showStep2() { return $this->showStep('step.step-invest.step2-invest'); }
    public function submitStep2(Request $request) {
        return $this->submitStep($request, ['investment_focus' => 'required|string|max:255'], 'step-invest.step3-invest');
    }

    // --- Step 3 ---
    public function showStep3() { return $this->showStep('step.step-invest.step3-invest'); }
    public function submitStep3(Request $request) {
        return $this->submitStep($request, ['growth_plan' => 'required|string'], 'step-invest.step4-invest');
    }

    // --- Step 4 ---
    public function showStep4() { return $this->showStep('step.step-invest.step4-invest'); }
    public function submitStep4(Request $request) {
        return $this->submitStep($request, ['ambition_plan' => 'required|string'], 'step-invest.step5-invest');
    }

    // --- Step 5 ---
    public function showStep5() { return $this->showStep('step.step-invest.step5-invest'); }
    public function submitStep5(Request $request) {
        return $this->submitStep($request, ['profit_goal' => 'required|string'], 'step-invest.step6-invest');
    }

    // --- Step 6 ---
    public function showStep6() { return $this->showStep('step.step-invest.step6-invest'); }
    public function submitStep6(Request $request) {
        return $this->submitStep($request, ['team_plan' => 'required|string'], 'step-invest.step7-invest');
    }

    // --- Step 7 ---
    public function showStep7() { return $this->showStep('step.step-invest.step7-invest'); }
    public function submitStep7(Request $request) {
        return $this->submitStep($request, ['sdg_goal' => 'required|string|max:255'], 'step-invest.step8-invest');
    }

    // --- Step 8 ---
    public function showStep8() { return $this->showStep('step.step-invest.step8-invest'); }
    public function submitStep8(Request $request) {
        return $this->submitStep($request, ['strategy_plan' => 'nullable|string'], 'step-invest.step9-invest');
    }

    // --- Step 9 ---
    public function showStep9() { return $this->showStep('step.step-invest.step9-invest'); }
    public function submitStep9(Request $request) {
        return $this->submitStep($request, [
            'investor_name' => 'required|string|max:255',
            'investor_email' => 'required|email'
        ], 'community.dashboard-invest');
    }

    // --- Dashboard ---
    public function showDashboard()
    {
        return view('community.dashboard-invest');
    }
}