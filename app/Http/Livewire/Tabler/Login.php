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

    public $email, $password;

    public function connexion()
    {
        Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        // Auth::attempt(['email' => $this->email, 'password' => Hash::make($this->password)]);
        return redirect('/');
    }
}
