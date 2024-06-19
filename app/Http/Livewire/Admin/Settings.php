<?php

namespace App\Http\Livewire\Admin;

use App\Models\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


use Livewire\Component;

class Settings extends Component
{
    
    public $payment_day, $critical_balance, $payment_time, $min_value;
    protected $rules = [
        'critical_balance'  =>  'bail|required|min:1',
        'payment_day'       =>  'required|between:1,28',
        'min_value'         =>  'reuired',
        'min_value'         =>  'required'
    ], 
    $messages = [
        'between'       =>  'Dia de pagamento deve ser entre 1 e 28.',
        'required' =>  'Todos campos são obrigatório.',
        'critical_balance.min'      =>  'Saldo Crítico inválido.',
    ];

    public function save()
    {
        try {
            $this->validate();
            $conf = Config::first()? : new Config;
            $conf->payment_day      =   $this->payment_day;
            $conf->critical_balance =   $this->critical_balance;
            $conf->min_value        =   $this->min_value;
            $conf->time     =   $this->payment_time;
            if($conf->save()){
                $this->emit('alert_response', 'Configurações Salva com sucesso!', 'success', Route::current()->getName());
                $this->mount();
            }
        } catch (ValidationException $e) {
            $this->emit('alert_response', $e->validator->errors()->first(), 'error', Route::current()->getName());
        }
    }

    public function mount()
    {
        if($conf = Config::first()){
            $this->payment_day = $conf->payment_day;
            $this->critical_balance = $conf->critical_balance;
            $this->payment_time = $conf->payment_time;
            $this->payment_time = $conf->time;
        }
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
