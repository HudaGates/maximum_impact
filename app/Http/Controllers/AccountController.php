<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function setup()
    {
        return view('account-setup');
    }

    public function success()
    {
        $firstName = 'John'; 
        return view('account-success', compact('firstName'));
    }
}
