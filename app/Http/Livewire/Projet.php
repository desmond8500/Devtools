<?php

namespace App\Http\Livewire;

use App\Models\Acteur;
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

        ]);
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

    // Acteur
    public $actor_name;
    public $actor_id=0, $actor_form=0;

    public function store_actor()
    {
        Acteur::create([
            'name' => $this->actor_name,
            'projet_id' => $this->projet_id,
        ]);

        $this->reset('actor_name');
    }
    public function edit_actor($id)
    {
        $this->actor_id = $id;
        $actor = Acteur::find($id);
        $this->actor_name = $actor->name;
    }
    public function update_actor()
    {
        $actor = Acteur::find($this->actor_id);
        $actor->name = $this->actor_name;

        $actor->save();

        $this->reset('actor_id', 'actor_name');
    }
    public function delete_actor(){
        $actor = Acteur::find($this->actor_id);
        $actor->delete();
    }

}
