<?php

namespace App\Http\Livewire\Tabler;

use App\Models\Diagramme;
use Livewire\Component;

class Database extends Component
{
    public $projet;

    public function mount($projet)
    {
        $this->projet = $projet;
    }

    public function render()
    {
        return view('livewire.tabler.database',[
            'diagrammes' => Diagramme::where('projet_id', $this->projet->id)->get(),
        ]);
    }


    public $name, $description, $content, $icon;
    public $diagramme_id = 0, $diagramme_form = 0;

    public function store_diagramme()
    {
        Diagramme::create([
            'projet_id' => $this->projet->id,
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
        ]);

        $this->reset('name', 'description', 'content', 'icon');
    }
    public function edit_diagramme($id)
    {
        $this->diagramme_id = $id;
        $diagramme = Diagramme::find($id);
        $this->name = $diagramme->name;
        $this->description = $diagramme->description;
        $this->content = $diagramme->content;
    }
    public function update_diagramme()
    {
        $diagramme = Diagramme::find($this->diagramme_id);
        $diagramme->name = $this->name;
        $diagramme->description = $this->description;
        $diagramme->content = $this->content;

        $diagramme->save();

        $this->reset('diagramme_id', 'name', 'description', 'content');
    }
    public function delete_diagramme()
    {
        $diagramme = Diagramme::find($this->diagramme_id);
        $diagramme->delete();
    }

    public function close()
    {
        $this->dispatchBrowserEvent('data-bs-dismiss:modal');
    }
}
