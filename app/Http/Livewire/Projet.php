<?php

namespace App\Http\Livewire;

use App\Models\Projet as ModelsProjet;
use Livewire\Component;

class Projet extends Component
{
    public $projet_id;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.projet',[
            'projet' => ModelsProjet::find($this->projet_id),
        ])->extends('layout')->section('content');
    }
}
