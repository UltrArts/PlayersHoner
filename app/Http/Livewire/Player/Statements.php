<?php

namespace App\Http\Livewire\Player;
use Illuminate\Support\Facades\Auth;


use App\Models\{
    Transaction
};
use Carbon\Carbon;
use Dompdf\Dompdf;
use Livewire\Component;
class Statements extends Component
{

    public $trans, $balance, $val;

    public function mount()
    {
        $user = Auth::user();
        $this->trans = $user->player->account->transactions()->orderBy('created_at', 'desc')->get();
        $this->balance = $user->player->account->balance;
    }

    public function render()
    {
        return view('livewire.player.statements');
    }

    public function downloadStatement()
    {
        $user = Auth::user();
        $name = $user->last_name . '-' . Carbon::now() . '.pdf';

        // Cria uma nova instância do Dompdf
        $dompdf = new Dompdf();

        // Renderiza a visão Blade em HTML
        $html = view('player.statement-model', ['trans' => $this->trans, 'balance' => $this->balance])->render();

        // Carrega o HTML no Dompdf
        $dompdf->loadHtml($html);

        // Renderiza o PDF
        $dompdf->render();

        // Gera o PDF e faz o download
        // return $dompdf->download($name);
        

    }
}
