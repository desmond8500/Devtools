<?php

namespace App\Http\Livewire\Projet;

use App\Models\Acteur;
use App\Models\Projet;
use App\Models\Team;
use Livewire\Component;

class Settings extends Component
{
    public $projet;

    public function mount($projet)
    {
        $this->projet = $projet;
    }

    public function render()
    {
        return view('livewire.projet.settings',[
            'acteurs' => Acteur::where('projet_id', $this->projet->id)->get(),
            'teams' => Team::where('projet_id', $this->projet->id)->get(),
        ]);
    }

    public $name, $description, $selected = 0;

    public function edit()
    {
        $projet = Projet::find($this->projet->id);
        $this->name = $projet->name;
        $this->description = $projet->description;
        $this->selected = 1;
    }
    public function update()
    {
        $projet = Projet::find($this->projet->id);
        $projet->name = $this->name;
        $projet->description = $this->description;

        $projet->save();

        $this->reset('selected');
    }
    public function delete()
    {
        $projet = Projet::find($this->projet->id);
        $projet->delete();
        return redirect()->route('projets');
    }

    // Acteur
    public $actor_name, $actor_description;
    public $actor_id = 0, $actor_form = 0;

    public function store_actor()
    {
        Acteur::create([
            'name' => $this->actor_name,
            'description' => $this->actor_description,
            'projet_id' => $this->projet->id,
        ]);

        // $this->reset('actor_name, actor_description');
    }
    public function edit_actor($id)
    {
        $this->actor_id = $id;
        $actor = Acteur::find($id);
        $this->actor_name = $actor->name;
        $this->actor_description = $actor->description;
    }
    public function update_actor()
    {
        $actor = Acteur::find($this->actor_id);
        $actor->name = $this->actor_name;
        $actor->description = $this->actor_description;

        $actor->save();

        $this->reset('actor_id', 'actor_name', 'actor_description');
    }
    public function delete_actor()
    {
        $actor = Acteur::find($this->actor_id);
        $actor->delete();
    }

    // Team
    public $team_name;
    public $team_id = 0, $team_form = 0;

    public function store_team()
    {
        Team::create([
            'name' => $this->team_name,
            'projet_id' => $this->projet->id,
        ]);

        $this->reset('team_name',);
    }
    public function edit_team($id)
    {
        $this->team_id = $id;
        $team = Team::find($id);
        $this->team_name = $team->name;
    }
    public function update_team()
    {
        $team = Team::find($this->team_id);
        $team->name = $this->team_name;

        $team->save();

        $this->reset('team_id', 'team_name');
    }
    public function delete_team()
    {
        $team = Team::find($this->team_id);
        $team->delete();
    }
}
