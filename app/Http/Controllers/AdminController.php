<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Models\{
    Player,
    Transaction,
    TransactionType
};

class AdminController extends Controller
{
    //


    public function dashboard()
    {
        
        if( Auth::user()->hasRole('admin'))
        {
            // Definir o tipo de transação
            $credit = 'credit';
            $debit = 'debit';

            // Calcular o intervalo de datas para o último mês
            $startOfMonth = Carbon::now()->subMonth()->startOfMonth();
            $endOfToday = Carbon::now()->endOfDay();

            // Consulta para obter o total de transações de crédito
            $trans_cred = Transaction::whereHas('transactionType', function ($query) use ($credit) {
                $query->where('type', $credit);
            })->sum('value');

            // Consulta para obter o total de transações de débito
            $trans_deb = Transaction::whereHas('transactionType', function ($query) use ($debit) {
                $query->where('type', $debit);
            })->sum('value');

            // Consulta para obter estatísticas dos jogadores
            $playerStats = Player::selectRaw("
                    COUNT(*) as total_players,
                    SUM(CASE WHEN is_retired = 0 THEN 1 ELSE 0 END) as active_players,
                    SUM(CASE WHEN is_retired = 1 THEN 1 ELSE 0 END) as retired_players,
                    SUM(CASE WHEN is_pre_register = 1 THEN 1 ELSE 0 END) as pre_registered_players
                ")->first();

            // Consulta para obter o total de transações de crédito do último mês
            $trans_cred_last_month = Transaction::whereHas('transactionType', function ($query) use ($credit) {
                $query->where('type', $credit);
            })
            ->whereBetween('created_at', [$startOfMonth, $endOfToday])
            ->sum('value');

            // Consulta para obter o total de transações de débito do último mês
            $trans_deb_last_month = Transaction::whereHas('transactionType', function ($query) use ($debit) {
                $query->where('type', $debit);
            })
            ->whereBetween('created_at', [$startOfMonth, $endOfToday])
            ->sum('value');

            return view('admin.dashboard', [
                'totalPlayers'          => $playerStats->total_players,
                'activePlayers'         => $playerStats->active_players,
                'retiredPlayers'        => $playerStats->retired_players,
                'preRegisteredPlayers'  => $playerStats->pre_registered_players,
                'credit_total'          => $trans_cred,
                'debit_total'           => $trans_deb,
                'trans_deb_last_month'  => $trans_deb_last_month,
                'trans_cred_last_month' => $trans_cred_last_month,
            ]);
        }else{
            $user =  Auth::user();
            $balance = $user
                        ->player
                        ->account
                        ->balance;
            $incoming = $user
                        ->player
                        ->account
                        ->transactions
                        ->where('transaction_type_id', TransactionType::first('id')->id)
                        ->sum('value');
            $outcoming = $user
                        ->player
                        ->account
                        ->transactions
                        ->where('transaction_type_id', '!=', TransactionType::first('id')->id)
                        ->sum('value');
            $is_retired = ($user->player->is_retired)? 'Reformado' : 'Em serviço';
            return view('admin.dashboard', [
                'balance'       =>  $balance,
                'is_retired'    =>  $is_retired,
                'incoming'      =>  $incoming,
                'outcoming'     =>  $outcoming
            ]);
        }
    }




    public function showPlayers()
    {
        return view('admin.players');
    }

    public function showAccounts($player = null)
    {
        // dd($player);
        if($player)
        {
            // session(['create_account' => true]);;
            return view('admin.accounts', ['sent_player' => $player]);
        }
        return view('admin.accounts');
    }

    public function showSettings()
    {
        return view('admin.settings');
    }
    
    
    public function showTransactions()
    {
        return view('admin.transactions');
    }

    public function showbank()
    {
        return view('bank');
    }
}
