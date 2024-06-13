<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $activePlayers = Player::
                        where('is_retired', false)
                        ->count();

        $retiredPlayers = Player::
                        where('is_retired', true)
                        ->count();

        $preRegisteredPlayers = Player::
                        where('is_pre_register', true)
                        ->count();
                            return view('admin.dashboard',[
                                'totalPlayers'          => $activePlayers + $retiredPlayers,
                                'activePlayers'         => $activePlayers,
                                'retiredPlayers'        => $retiredPlayers,
                                'preRegisteredPlayers'  => $preRegisteredPlayers,

                            ]);
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

    public function showbank()
    {
        return view('bank');
    }
}
