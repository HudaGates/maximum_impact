<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessGrowthController extends Controller
{
    public function step1()
    {
        return view('myproject.bussines-growth1');
    }

    public function step2(Request $request)
    {
        $month1 = $request->input('month1');
        return redirect()->route('bussines-growth2-page');
    }

    public function step3(Request $request)
    {
        $month1 = $request->input('month1');
        return redirect()->route('bussines-growth3-page');
    }

    public function step4(Request $request)
    {
        $month1 = $request->input('month1');
        return redirect()->route('bussines-growth4-page');
    }

    public function step5(Request $request)
    {
        $month1 = $request->input('month1');
        return redirect()->route('bussines-growth5-page');
    }

    public function step6()
    {
        return view('myproject.bussines-growth6');
    }

    public function step7(Request $request)
    {
        $month1 = $request->input('month1');
        return redirect()->route('bussines-growth7-page');
    }

    public function step8(Request $request)
{
    $month1 = $request->input('month1');
    
    return redirect()->route('bussines-growth8-page');
}

}
