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

    // Projet

    public $name, $description, $selected=0;

    public function edit()
    {
        $projet = ModelsProjet::find($this->projet_id);
        $this->name = $projet->name;
        $this->description = $projet->description;
        $this->selected = 1;
    }
    public function update()
    {
        $projet = ModelsProjet::find($this->projet_id);
        $projet->name = $this->name;
        $projet->description = $this->description;

        $projet->save();

        $this->reset('selected');
    }
    public function delete(){
        $projet = ModelsProjet::find($this->projet_id);
        $projet->delete();
        return redirect()->route('projets');
    }
}
