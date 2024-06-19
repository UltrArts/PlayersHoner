<?php

namespace App\Http\Livewire\Player;
use Illuminate\Support\Facades\Auth;


use App\Models\{
    Transaction
};
use Livewire\Component;

class Statements extends Component
{

    public $trans, $balance;

    public function mount()
    {
        $user = Auth::user();
        $this->trans = $user->player->account->transactions()->orderBy('created_at', 'desc')->get();
        $this->balance = $user->player->account->balance;
        // $this->trans = Transaction::with('transactionType', 'account.player')
        //                             ->orderBy('created_at', 'desc')
        //                             ->get();
    }

    public function render()
    {
        return view('livewire.player.statements');
    }
}
