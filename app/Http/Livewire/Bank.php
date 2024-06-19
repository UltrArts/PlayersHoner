<?php

namespace App\Http\Livewire;
use Illuminate\Validation\ValidationException;

use App\Models\{
    Account,
    Player,
    TransactionType,
    Transaction,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Bank extends Component
{

    public $selected_account;
    public $selected_account_id, $owner, $bank_name, $value;

    protected $rules = [
        'value'                 =>  'bail|required',
        'selected_account_id'   =>  'bail|required'
    ],
    $messages = [
        'required'  =>  'Todos os campos são obrigatórios',
        'min'       =>  'O valor deve ser maior que 100'
    ];


    public function transfer()
    {
        try {
            $this->validate();
            $transation_type = TransactionType::where('type', 'credit')->first();
            // Setting the value according the kind of tax
            $this->selected_account->load('taxType');
            if(($this->selected_account->taxType->type == 'Percentual'))
                $val = ($this->selected_account->tax_value / 100) * $this->value;
            else
                $val = ($this->value <= $this->selected_account->tax_value)
                        ?$this->value
                        :$this->selected_account->tax_value;
                   
            $trans = new Transaction([
                        'value'                 => $val,
                        'account_id'            => $this->selected_account_id,
                        'transaction_type_id'   => $transation_type->id
                    ]);
            if($trans->save()){
                //Updating the balance
                $this->selected_account->balance = $this->selected_account->balance + $val;
                $this->selected_account->save();
                $this->clearFields();

                $this->emit('alert_response', 'Transferência efectuada com sucesso!', 'success', '');
            }else
                $this->emit('alert_response', 'Houve uma falha na transferência', 'error', '');


        } catch (ValidationException $e) {
            $this->emit('alert_response', $e->validator->errors()->first(), 'error', '');
        }
    }

    public function clearFields()
    {
        $this->selected_account_id = null;
        $this->selected_account = null;
        $this->owner = null;
        $this->bank_name = null;
        $this->value = null;

    }


    public function updatedSelectedAccountId($val)
    {
        $this->selected_account = Account::with('player', 'bank')->find($val);
        if($this->selected_account){
            if($this->selected_account->player)
                $this->owner = $this->selected_account->player->name .' '. $this->selected_account->player->last_name;
            $this->bank_name = $this->selected_account->bank->bank_name?? '';
        }
    }

    public function render()
    {
        return view('livewire.bank');
    }
}
