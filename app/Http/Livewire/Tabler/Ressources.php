<?php

namespace App\Http\Livewire\Tabler;

use App\Models\Ressources as ModelsRessources;
use Livewire\Component;

class Ressources extends Component
{
    public $projet;

    public function mount($projet)
    {
        $this->projet= $projet;
    }

    public function render()
    {
        return view('livewire.tabler.ressources',[
            'ressources' => ModelsRessources::where('projet_id', $this->projet->id)->get()
        ]);
    }

    public $name, $description, $link, $icon;
    public $ressource_id=0, $ressource_form=0;

    public function store_ressource()
    {
        ModelsRessources::create([
            'projet_id' => $this->projet->id,
            'name' => $this->name,
            'description' => $this->description,
            'link' => $this->link,
        ]);

        $this->reset('name', 'description', 'link', 'icon');
    }
    public function edit_ressource($id)
    {
        $this->ressource_id = $id;
        $ressource = ModelsRessources::find($id);
        $this->name = $ressource->name;
        $this->description = $ressource->description;
        $this->link = $ressource->link;
        $this->icon = $ressource->icon;
    }
    public function update_ressource()
    {
        $ressource = ModelsRessources::find($this->ressource_id);
        $ressource->name = $this->name;
        $ressource->description = $this->description;
        $ressource->link = $this->link;
        $ressource->icon = $this->icon;

        $ressource->save();

        $this->reset('ressource_id', 'name', 'description', 'link', 'icon');
    }
    public function delete_ressource(){
        $ressource = ModelsRessources::find($this->ressource_id);
        $ressource->delete();
    }

}
