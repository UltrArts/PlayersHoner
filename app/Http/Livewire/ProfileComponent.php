<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class ProfileComponent extends Component
{

    public $old_pass, $new_pass, $new_pass_confirmation;

    protected function rules()
    {
        return [
            'old_pass' => 'required',
            'new_pass' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'new_pass_confirmation' => 'bail|required|same:new_pass',
        ];
    }

    
    public $messages = [
        'same'          =>  'As senhas não conferem.',
        'old_pass.required'             => 'O campo senha actual é obrigatório.',
        'new_pass.required'             => 'O campo nova senha é obrigatório.',
        'new_pass.confirmed'            => 'A confirmação da nova senha não corresponde.',
        'new_pass.min'                  => 'A nova senha deve ter pelo menos :min caracteres.',
        'password.letters'              => 'A nova senha deve conter letras.',
        'password.mixed'                => 'A nova senha deve conter letras maiúsculas e minúsculas.',
        'password.numbers'              => 'A nova senha deve conter números.',
        'password.symbols'              => 'A nova senha deve conter símbolos.',
        'password.uncompromised'        => 'A nova senha não é segura o suficiente. Escolha uma senha mais forte.',
        'new_pass_confirmation.required'=> 'O campo confirmação de nova senha é obrigatório.',
    ];



    public function saveUser()
    {
        if (!Hash::check($this->old_pass, auth()->user()->password)) {
            $this->addError('old_pass', 'A senha atual está incorreta.');
            return;
        }

        // Atualiza a senha do usuário
        $user = User::find(Auth::user()->id);
        $user->update(['password' => Hash::make($this->new_pass)]);
        session()->flash('success', true);
        $this->clearFields();
    }

    public function clearFields()
    {
        $this->new_pass = null;
        $this->old_pass = null;
        $this->new_pass_confirmation = null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    // public function updated($old_pass, $new_pass, $conf_pass)
    // {
        
    // }



    public function render()
    {
        return view('livewire.profile-component');
    }

}
