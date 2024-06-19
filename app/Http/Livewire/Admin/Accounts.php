<?php

namespace App\Http\Livewire\Admin;
use App\Models\{ Bank, TaxType, Player, Account} ;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;



class Accounts extends Component
{
    public $is_new,
            $filter = "all",
            $filterOpt = ['all', 'active', 'retired', 'preregiter'],
            $banks, $account_number, $accounts,
            $tax_types, $tax_type,
            $account_nib, $tax_value, $bank_id, $player_id, $sent_player;


    protected $rules = [
        'bank_id' =>  'required',
        'account_number'     =>  'bail|required|unique:accounts,account_number|min:14',
        'account_nib'        =>  'bail|required|unique:accounts,account_nib|min:14',
        'player_id' =>  'required',
        'tax_type'       =>  'required',
        'tax_value'      =>  'bail|nullable|min:1',
    ],

    $messages = [
        'bank_id.required'        =>  'O campo banco é obrigatório',
        'account_number.required'   =>  'Conta bancária é obrigatório',
        'account_number.unique'     =>  'Conta bancária indisponível!',
        'account_number.min'        =>  'A conta bancária deve ter 14 dígitos oou mais.',
        'account_nib.required'      =>  'O NIB é obrigatório',
        'account_nib.unique'        =>  'NIB indisponível!',
        'account_nib.min'           =>  'O NIB deve ter 14 dígitos oou mais.',
        'player_id.required'        =>  'Selecione o proprietário.',
        'tax_type.required'         =>  'Selecione o tipo de pagamento.',
        'tax_value.min'             =>  'Valor inválido!',

    ];



    public function setIsNew()
    {
        $this->is_new = !$this->is_new;
    }

    public function saveAccoount()
    {
        try {
            $this->validate();

            if(($this->tax_type == TaxType::first('id')) && ($this->tax_value < 1 || $this->tax_value > 100))
                $this->emit('alert_response', 'Valor inválido!', 'error', Route::current()->getName());
            else
                if(Account::where('player_id', $this->player_id)->first())
                    $this->emit('alert_response', 'O jogador já possui uma conta', 'error', Route::current()->getName());
                else{}
                    if (Account::create([
                        'account_number'    =>  $this->account_number,
                        'account_nib'       =>  $this->account_nib,
                        'player_id'         =>  $this->player_id,
                        'tax_value'         =>  $this->tax_value,
                        'bank_id'           =>  $this->bank_id,
                        'tax_type_id'       =>  $this->tax_type,
                    ])) {
                        $this->emit('alert_response', 'Conta Salva com sucesso!', 'success', Route::current()->getName());
                        $this->clearFields();
                        $this->is_new = false;
                        if(session()->has('create_account'))
                            session()->forget('create_account');
                    }else
                        $this->emit('alert_response', 'Falha ao Salvar Conta', 'error', Route::current()->getName());

        } catch (ValidationException $e) {
            $this->emit('alert_response', $e->validator->errors()->first(), 'error', Route::current()->getName());
        }

    }

    public function clearFields()
    {
        $this->account_number = null;
        $this->account_nib = null;
        $this->player_id = null;
        $this->tax_value = null;
        $this->bank_id = null;
        $this->tax_type = null;
        $this->mount();
    }

    public function activate($acc_id, $pl_id, $status)
    {
        $acc = Account::find($acc_id);
        $pl = Player::find($pl_id);
        if($acc)
            $acc->update(['is_available' => $status]);
        if($pl)
            $pl->update(['is_available' => $status]);
        $this->mount();
    }

    public function mount()
    {
        $this->banks = Bank::get('bank_name');
        $this->accounts = Account::with('player', 'bank')->orderBy('updated_at', 'desc')->get();
        $this->tax_types = TaxType::get();
    }

    public function render()
    {
        if($this->sent_player && session()->has('create_account')){
            $this->player_id = $this->sent_player;
            $this->sent_player = $this->sent_player;
            $this->is_new = true;
        } 

            // dd($this->sent_player);
        return view('livewire.admin.accounts');
    }
}
