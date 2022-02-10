<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $email, $password, $alert=0;

    public function login()
    {
        return view('auth.login');
    }

    public function connexion(Request $request)
    {
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($auth) {
            return redirect()->route('index');
        } else {
            session()->flash('message', 'Les identifiants saisis sont incorrectes');
            $this->alert = 'Les identifiants saisis sont incorrectes';

            return view('auth.login', [
                'alert' => $this->alert
            ]);
        }
    }

    public function register()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset('name', 'email', 'password');

        return redirect()->route('register');
    }
}
