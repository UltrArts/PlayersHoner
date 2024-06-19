<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Validation\ValidationException;

use App\Models\{
    Transaction,
    Account,
    TransactionType
};

class Transactions extends Component
{

    public $trans, $is_new, $selected_trans = null;
    public $value;

    public $rules = [
        'value'    =>  'required|min:1'
    ],
    $messages   =   [
        'required'  =>  'Valor obrigatório',
        'Valor inválido'
    ];

    public function payPlayer()
    {
        try {
            $this->validate();
            if(!$this->selected_trans->account->player->is_retired)
                $this->emit('alert_response', 'O Jogador proprietário da conta não é reformado!', 'error', '');
            elseif(!$this->selected_trans->account->player->is_available)
                $this->emit('alert_response', 'O Jogador proprietário da conta está desabilitado!', 'error', '');
            else{
                $tra = new Transaction([
                    'value'                 =>  $this->value,
                    'account_id'            =>  $this->selected_trans->account_id,
                    'transaction_type_id'   =>  TransactionType::where('type', 'debit')->first('id')->id
                ]);
                $ac = Account::find($this->selected_trans->account_id);
                if($ac->balance < $this->value)
                    $this->emit('alert_response', 'Saldo Insuficiente!', 'error', '');

                elseif($tra->save())
                {
                    $ac->balance =  $ac->balance - $this->value;
                    if($ac->save()){
                        $this->emit('alert_response', 'Conta Salva com sucesso!', 'success', '');
                        $this->clearFields();
                    }else
                        $this->emit('alert_response', 'Ohps! Algo correu mal.', 'error', '');
                }
            }

            
        } catch (ValidationException $e) {
            $this->emit('alert_response', $e->validator->errors()->first(), 'error', '');

        }
    }
   
    public function selectedRow($id)
    {
        $this->selected_trans = Transaction::find($id) ? : null;
    }

    public function clearFields()
    {
      $this->selected_trans = null;
      $this->value = null;
      $this->mount();
    }

    public function mount()
    {
        $this->trans = Transaction::with('transactionType', 'account.player')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
    }
    


    public function render()
    {
        return view('livewire.admin.transactions');
    }
}
