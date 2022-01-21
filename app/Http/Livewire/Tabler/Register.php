<?php

namespace App\Http\Livewire\Tabler;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.tabler.register');
    }

    public $name, $email, $password;
    public $user_id=0, $user_form=0;

    public function store_user()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset('name', 'email', 'password');

        return redirect()->route('register');
    }
    public function edit_user($id)
    {
        $this->user_id = $id;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function update_user()
    {
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        $user->save();

        $this->reset('user_id', 'name', 'email', 'password');
    }
    public function delete_user(){
        $user = User::find($this->user_id);
        $user->delete();
    }

}
