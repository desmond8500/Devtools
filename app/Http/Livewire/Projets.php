<?php

namespace App\Http\Livewire;

use App\Models\Projet;
use Livewire\Component;
use Livewire\WithPagination;

class Projets extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.projets',[
            'projets' => Projet::paginate(12),
        ]);
    }

    // Projets

    public $name, $description;

    public function store()
    {
        Projet::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset('name', 'description');
    }
    public function edit($id)
    {
        $this->instance_id = $id;
        $instance = Projet::find($id);
        $this->name = $instance->name;
    }
    public function update()
    {
        $instance = Projet::find($this->instance_id);
        $instance->name = $this->name;

        $instance->save();

        $this->reset('instance_id');
    }
    public function delete(){
        $instance = Projet::find($this->instance_id);
        $instance->delete();
    }

}
