<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{
    Account, User, Player
};
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class Players extends Component
{
    public $is_new, $filter = "all", $filterOpt = ['all', 'active', 'retired', 'preregiter'];
    public $name, $last_name, $email, $tel, $tel2, $birth, $players, $selected_player; 

    public function render()
    {
        return view('livewire.admin.players');
    }

    public function mount()
    {
        $this->players = Player::get();
        // $this->emit('alert_response', $message, $status, $url);
    }

    public function selectedRow($id)
    {
            $this->selected_player = Player::find($id) ? : null;
    }

    public function enable()
    {
       if($this->selected_player){
            $this->selected_player->is_available = ! $this->selected_player->is_available;
            $this->selected_player->save();
            $this->mount();
            $this->clearFields();
            $this->emit('alert_response', 'Jogador Actualizado Com sucesso!', 'success', Route::current()->getName());
       }
    }
    
    public function retiring()
    {
        if($this->selected_player){
            $this->selected_player->is_retired = ! $this->selected_player->is_retired;
            $this->selected_player->save();
            $this->mount();
            $this->clearFields();
            $this->emit('alert_response', 'Jogador Actualizado Com sucesso!', 'success', Route::current()->getName());
        }
    }

    public function setIsNew()
    {
        $this->is_new = !$this->is_new;
    }

    public function filtering($item)
    {
    $this->filter = $item;
    }

    protected $rules = [
        'name'      =>  'required',
        'last_name' =>  'required',
        'email'     =>  'bail|required|unique:users,email',
        'tel'       =>  'bail|required|min:6|max:9',
        'tel2'      =>  'nullable|min:6|max:9',
        'birth'     =>  'bail|required|date|before_or_equal:-18 years'
    ],

    $messages = [
        'name.required'         =>  'Campo nome é obrigatório',
        'last_name.required'    =>  'Campo apelido é obrigatório',
        'email.required'        =>  'O email é obrigatório',
        'email.email'           =>  'Formato de email inválido',
        'email.unique'          =>  'Email indisponível!!',
        'tel.required'          =>  'Campo telefone é obrigatório',
        'tel.min'               =>  'Número de telefone inválido!',
        'tel.max'               =>  'Número de telefone inválido!',
        'birth.required'        =>  'Data de nascimento obrigatória',
        'birth.date'            =>  'Data inválida',
        'birth.before_or_equal' =>  'O Jogador deve ser maior de 18 anos.',

    ];

    public function savePlayer()
    {
        try {
            $this->validate();
            $user = User::create([
                'name'      =>  $this->name . ' '. $this->last_name,
                'email'     =>  $this->email,
                'password'  =>  Hash::make('password'),
            ]);
    
            if($user){
                $user->player()->create([
                        'name'      =>  $this->name,
                        'last_name' =>  $this->last_name,
                        'tel'       =>  $this->tel,
                        'tel2'      =>  $this->tel2,
                        'birth'     =>  $this->birth,
                        'email'     =>  $this->email,
                ]);
                $user->assignRole('player');
                $this->emit('alert_response', 'Jogador Salvo Com sucesso!', 'success', Route::current()->getName());
                $this->clearFields();
                $this->mount();
                // $this->setIsNew();
            }else{
                $this->emit('alert_response', 'Falha ao Salvar Jogador', 'error', Route::current()->getName());
            }  
        } catch (ValidationException $e) {
            $this->emit('alert_response', $e->validator->errors()->first(), 'error', Route::current()->getName());
        }

    }

    public function clearFields()
    {
        $this->name = null;
        $this->last_name = null;
        $this->tel = null;
        $this->tel2 = null;
        $this->birth = null;
        $this->email = null;
        $this->selected_player = null;
    }
}
