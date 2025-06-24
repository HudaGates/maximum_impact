<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepController extends Controller
{
    public function step1()
    {
        return view('step.step1');
    }
    public function showStep1()
    {
        return view('step.step1');
    }
    public function submitStep1(Request $request)
    {
        return redirect()->route('step2');
    }
    public function showStep2()
    {
        return view('step.step2');
    }
    public function submitStep2(Request $request)
    {
        return redirect()->route('step3');
    }
    public function step2()
{
    return view('step.step2');
}
public function step3()
    {
        return view('step.step3');
    }
    public function showStep3()
    {
        return view('step.step3');
    }
    public function submitStep3(Request $request)
    {
        return redirect()->route('step4');
    }
    public function showStep4()
    {
        return view('step.step4');
    }
    public function submitStep4(Request $request)
    {
        return redirect()->route('step5');
    }
    public function step4()
    {
        return view('step.step4');
    }
    public function step5()
    {
        return view('step.step5');
    }
    public function showStep5()
    {
        return view('step.step5');
    }
    public function submitStep5(Request $request)
    {
        return redirect()->route('step6');
    }
    public function step6()
    {
        return view('step.step6');
    }
    public function showStep6()
    {
        return view('step.step6');
    }
    public function submitStep6(Request $request)
    {
        return redirect()->route('step7');
    }
    public function step7()
    {
        return view('step.step7');
    }
    public function showStep7()
    {
        return view('step.step7');
    }
    public function submitStep7(Request $request)
    {
        return redirect()->route('step8');
    }
    public function step8()
    {
        return view('step.step8');
    }
    public function showStep8()
    {
        return view('step.step8');
    }
    public function submitStep8(Request $request)
    {
        return redirect()->route('step9');
    }
    public function showStep9()
    {
        $proof = 'Receipt #001';
        return view('step.step9', compact('proof'));
    }
    


    public function step9()
    {
        return view('step.step9'); 
    }
    public function submitStep9(Request $request)
{
    return redirect()->route('account.setup');
}

public function showAccountSetup()
{
    return view('account-setup');
}
   
}
