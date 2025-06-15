<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepInvestController extends Controller
{
    public function step1()
    {
        return view('step.step-invest.step1-invest');
    }
    public function showStep1()
    {
        return view('step.step-invest.step1-invest');
    }
    public function submitStep1(Request $request)
    {
        return redirect()->route('step-invest.step2-invest');
    }
    public function showStep2()
    {
        return view('step.step-invest.step2-invest');
    }
    public function submitStep2(Request $request)
    {
        return redirect()->route('step-invest.step3-invest');
    }
    public function step2()
{
    return view('step.step-invest.step2-invest');
}
public function step3()
    {
        return view('step.step-invest.step3-invest');
    }
    public function showStep3()
    {
        return view('step.step-invest.step3-invest');
    }
    public function submitStep3(Request $request)
    {
        return redirect()->route('step-invest.step4-invest');
    }
    public function showStep4()
    {
        return view('step.step-invest.step4-invest');
    }
    public function submitStep4(Request $request)
    {
        return redirect()->route('step-invest.step5-invest');
    }
    public function step4()
    {
        return view('step.step-invest.step4-invest');
    }
    public function step5()
    {
        return view('step.step-invest.step5-invest');
    }
    public function showStep5()
    {
        return view('step.step-invest.step5-invest');
    }
    public function submitStep5(Request $request)
    {
        return redirect()->route('step-invest.step6-invest');
    }
    public function step6()
    {
        return view('step.step-invest.step6-invest');
    }
    public function showStep6()
    {
        return view('step.step-invest.step6-invest');
    }
    public function submitStep6(Request $request)
    {
        return redirect()->route('step-invest.step7-invest');
    }
    public function step7()
    {
        return view('step.step-invest.step7-invest');
    }
    public function showStep7()
    {
        return view('step.step-invest.step7-invest');
    }
    public function submitStep7(Request $request)
    {
        return redirect()->route('step-invest.step8-invest');
    }
    public function step8()
    {
        return view('step.step-invest.step8-invest');
    }
    public function showStep8()
    {
        return view('step.step-invest.step8-invest');
    }
    public function submitStep8(Request $request)
    {
        return redirect()->route('step-invest.step9-invest');
    }
    public function showStep9()
    {
        return view('step.step-invest.step9-invest');
    }



    public function step9()
    {
        return view('step.step-invest.step9-invest');
    }
public function submitStep9(Request $request)
{
    return redirect()->route('community.dashboard-invest');
}

public function showDashboard()
{
    return view('community.dashboard-invest');
}
}
