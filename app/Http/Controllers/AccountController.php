<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AccountController extends Controller
{
    public function setup()
    {
        return view('account-setup');
    }

    public function success()
    {
       
        $user = Auth::user();

        
        if (!$user) {
            return redirect()->route('login');
        }

        
        $firstName = $user->first_name ?? 'there'; 

        // Kirim nama ke view 'account-success'
        return view('account-success', compact('firstName'));
    }
}