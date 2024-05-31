<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class Login extends Component

{
    public  $email, 
            $password, 
            $remember = false, 
            $message,
            $name,
            $last_name,
            $email2,
            $tel;


    protected $rules = [
        'email'     => 'bail|required|email',
        'password'  => 'bail|required|min:6',
    ],
    $messages = [
        'email.required'    =>   'O email é obrigatório',
        'email.email'       =>   'Formato de email inválido',
        'password.required' =>  'O campo password é obrigatório',
        'password.min'      =>   'Password não segura!',
    ];

    public function login()
    {
            $this->message = "";
            $this->validate();
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
                session()->regenerate();
                return redirect()->intended('/');
            }else{
                $this->message = "As credenciais inseridadas estão incorrectas!";
            }
       
    }

    public function register()
    {
        $this->message = "";
        // dd($request);
        $validated = $this->validate([
            'name'      => 'required',
            'last_name' => 'required',
            'email2'    => 'bail|required|email:exists:users,email',
            'tel'       => 'bail|required|min:6|max:9',
        ],[
            'name.required'         =>  'Campo nome é obrigatório',
            'last_name.required'    =>  'Campo apelido é obrigatório',
            'email2.required'       =>  'O email é obrigatório',
            'email2.email'          =>  'Formato de email inválido',
            'email2.exists'         =>  'Email indisponível!!',
            'tel.required'          =>  'Campo telefone é obrigatório',
            'tel.min'               =>  'Número de telefone inválido!',
            'tel.max'               =>  'Número de telefone inválido!',
    
        ]);
    }

    
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
