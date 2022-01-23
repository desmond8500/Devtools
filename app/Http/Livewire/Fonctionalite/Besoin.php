<?php

namespace App\Http\Livewire\Fonctionalite;

use App\Models\Acteur;
use App\Models\BesoinFonctionel as ModelsBesoinFonctionel;
use App\Models\Comment;
use App\Models\Etape;
use App\Models\Scenario;
use App\Models\Sticker;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Besoin extends Component
{
    protected $paginationTheme = 'bootstrap';

    // public function updatingSearch() {
    //     $this->resetPage();
    // }
    public $search ='';

    public $projet;

    public function mount($projet)
    {
        $this->projet = $projet;
    }

    public function render()
    {
        return view('livewire.fonctionalite.besoin',[
            'acteurs' => Acteur::all(),
            'besoins' => ModelsBesoinFonctionel::where('name', 'like', '%' . $this->search . '%')->where('projet_id', $this->projet->id)->get(),
            'user_id' => Auth::id(),
            'teams' => Team::where('projet_id', $this->projet->id)->get()
        ]);
    }
    // Besoin
    public $name, $acteur, $fonctionalite, $prerequis, $description;
    public $acteur_list = [];
    public $selected=0, $besoin_id=0;
    public function store()
    {
        $besoin = ModelsBesoinFonctionel::create([
            'projet_id' => $this->projet->id,
            'name' => $this->name,
            'acteur' => $this->acteur,
            'prerequis' => $this->prerequis,
            'description' => $this->description,
        ]);

        $scenario = Scenario::create([
            'besoin_id' => $besoin->id,
            'type' => 'nominal'
        ]);

        $this->reset('name', 'acteur', 'prerequis', 'description');
    }
    public function edit($id)
    {
        $this->besoin_id = $id;
        $besoin = ModelsBesoinFonctionel::find($id);
        $this->name = $besoin->name;
        $this->acteur = $besoin->acteur;
        $this->prerequis = $besoin->prerequis;
        $this->description = $besoin->description;
    }
    public function update()
    {
        $besoin = ModelsBesoinFonctionel::find($this->besoin_id);
        $besoin->name = $this->name;
        $besoin->acteur = $this->acteur;
        $besoin->prerequis = $this->prerequis;
        $besoin->description = $this->description;

        $besoin->save();

        $this->reset('besoin_id');
    }
    public function delete(){
        $besoin = ModelsBesoinFonctionel::find($this->besoin_id);
        $besoin->delete();
    }

    public function add_actor($name)
    {
        $this->acteur .= " ,$name";
    }

    // Etape
    public $etape_id=0, $etape_name, $etape_description = "Description de l'étape", $scenario_id, $ordre=0;

    public function store_etape($id)
    {
        $etape = Etape::create([
            'scenario_id' => $id,
            'ordre' => $this->ordre,
            'description' => $this->etape_description,
        ]);

        $etape->ordre = $etape->id;
        $etape->save();

        $this->reset('etape_description');
    }
    public function edit_etape($id)
    {
        $this->etape_id = $id;
        $etape = Etape::find($id);
        $this->etape_description = $etape->description;
    }
    public function update_etape()
    {
        $etape = Etape::find($this->etape_id);
        $etape->description = $this->etape_description;

        $etape->save();

        $this->reset('etape_id', 'etape_description');
    }
    public function delete_etape(){
        $etape = Etape::find($this->etape_id);
        $etape->delete();
    }

    // Scenario

    public function store_scenario($etape, $besoin)
    {
        Scenario::create([
            'besoin_id' => $besoin,
            'type' => $etape,
        ]);

        // $this->reset('name');
    }
    public function edit_scenario($id)
    {
        $this->instance_id = $id;
        $instance = Scenario::find($id);
        $this->name = $instance->name;
    }
    public function update_scenario()
    {
        $instance = Scenario::find($this->instance_id);
        $instance->name = $this->name;

        $instance->save();

        $this->reset('instance_id');
    }
    public function delete_scenario($id){
        $instance = Scenario::find($id);
        $instance->delete();
    }

    // Commentaires

    public $comment_description;
    public $comment_id=0, $comment_form=0;

    public function store_comment()
    {
        Comment::create([
            'description' => $this->comment_description,
            'besoin_id' => $this->selected,
            'user_id' => Auth::id(),
        ]);

        $this->reset('comment_description');
    }
    public function edit_comment($id)
    {
        $this->comment_id = $id;
        $comment = Comment::find($id);
        $this->comment_description = $comment->description;
    }
    public function update_comment()
    {
        $comment = Comment::find($this->comment_id);
        $comment->description = ucfirst($this->comment_description);

        $comment->save();

        $this->reset('comment_id', 'comment_description',);
    }
    public function delete_comment($id){
        $comment = Comment::find($id);
        $comment->delete();
    }

    //  Acteur

    public $actor_desc = 0;


    public function show_actor_description($id)
    {
        $actor = Acteur::find($id);
        $this->actor_desc = $actor->description;
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
// Sticker
    public function add_sticker($id)
    {
        Sticker::create([
            'besoin_id' => $this->selected,
            'team_id' => $id,
        ]);
    }

    public function delete_sticker($id)
    {
        $sticker = Sticker::find($id);
        $sticker->delete();
    }
}
