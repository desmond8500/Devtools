<?php

namespace App\Http\Livewire\Tabler;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.tabler.login');
    }

    public $email, $password, $alert;

    public function connexion()
    {
        $auth = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($auth) {
            return redirect()->route('index');
        } else {
            session()->flash('message', 'Les identifiants saisis sont incorrectes');
            $this->alert = 'Les identifiants saisis sont incorrectes';
        }
        $this->alert = $auth;

    }
}
