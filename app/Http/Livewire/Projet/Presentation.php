<?php

namespace App\Http\Livewire\Projet;

use App\Models\Projet;
use Livewire\Component;

class Presentation extends Component
{
    public $projet;

    public function mount($projet)
    {
        $this->projet = $projet;
    }

    public function render()
    {
        return view('livewire.projet.presentation');
    }


}
