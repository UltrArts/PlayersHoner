<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showPlayers()
    {
        return view('admin.players');
    }

    public function showAccounts()
    {
        return view('admin.accounts');
    }

    public function showSettings()
    {
        return view('admin.settings');
    }
    
    
    public function showIncomings()
    {
        return view('admin.incomings');
    }
    
    public function showOutcomings()
    {
        return view('admin.outcomings');
    }
}
