<?php

namespace App\Http\Livewire\Fonctionalite;

use App\Models\Acteur;
use App\Models\BesoinFonctionel as ModelsBesoinFonctionel;
use App\Models\Comment;
use App\Models\Etape;
use App\Models\Scenario;
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

            // 'besoins' => ModelsBesoinFonctionel::query()
                // ->where('name', 'like', '%' . $this->search . '%')
                // ->orwhere('projet_id', $this->projet->id)
                // ->get(),
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
            'besoin_id' => $this->besoin_id,
            'user_id' => Auth::id(),
        ]);

        $this->reset('description');
    }
    public function edit_comment($id)
    {
        $this->comment_id = $id;
        $comment = Comment::find($id);
        $this->description = $comment->description;
        $this->name1 = $comment->name1;
        $this->name2 = $comment->name2;
        $this->name3 = $comment->name3;
        $this->name4 = $comment->name4;
        $this->name5 = $comment->name5;
    }
    public function update_comment()
    {
        $comment = Comment::find($this->comment_id);
        $comment->description = $this->description;
        $comment->name1 = $this->name1;
        $comment->name2 = $this->name2;
        $comment->name3 = $this->name3;
        $comment->name4 = $this->name4;
        $comment->name5 = $this->name5;

        $comment->save();

        $this->reset('comment_id', 'description', 'name1', 'name2', 'name3', 'name4', 'name5');
    }
    public function delete_comment(){
        $comment = Comment::find($this->comment_id);
        $comment->delete();
    }

}
