<?php

namespace App\Http\Livewire\Tutos;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Navbar extends Component
{

    public function render()
    {
        return view('livewire.tutos.navbar',[
            'menus'=> $this->getmenu(),
        ]);
    }

    public function getmenu()
    {
        // return Storage::disk('tutos')->files('');
        return Storage::disk('tutos')->directories();
    }
    public function init()
    {

    }
}
