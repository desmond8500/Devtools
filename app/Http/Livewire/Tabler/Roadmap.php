<?php

namespace App\Http\Livewire\Tabler;

use App\Models\Jalon;
use App\Models\Roadmap as ModelsRoadmap;
use App\Models\Sprint;
use App\Models\Team;
use Livewire\Component;

class Roadmap extends Component
{
    public $projet;
    public $roadmap;

    public function mount($projet)
    {
        $this->projet = $projet;
        if ($this->roadmap) {
            $this->roadmap = ModelsRoadmap::find($projet->roadmap->id);
            $this->sprint_order = $projet->roadmap->sprint;

            if ($projet->roadmap->sprints->count()) {
                $this->sprint_order = $projet->roadmap->sprints->count()+1;
            } else {
                $this->sprint_order = 1;
            }
        }

    }

    protected $listeners = [
        'roadmapAdded' => 'render',
        'sprintAdded' => 'render',
        'jalon' => 'render',
    ];

    public function render()
    {
        return view('livewire.tabler.roadmap',[
            'roadmap' => $this->projet->roadmap,
            'team' => Team::where('projet_id', $this->projet->id)->get()
        ]);
    }

    public $roadmap_name, $roadmap_client, $roadmap_chief, $roadmap_date;
    public $roadmap_id=0, $roadmap_form=0;

    public function edit_roadmap($id)
    {
        $this->roadmap_id = $id;
        $roadmap = ModelsRoadmap::find($id);
        $this->roadmap_name = $roadmap->name;
        $this->roadmap_client = $roadmap->client;
        $this->roadmap_chief = $roadmap->chief;
        $this->roadmap_date = $roadmap->start_date;
    }
    public function update_roadmap()
    {
        $roadmap = ModelsRoadmap::find($this->roadmap_id);
        $roadmap->name = $this->roadmap_name;
        $roadmap->client = $this->roadmap_client;
        $roadmap->chief = $this->roadmap_chief;
        $roadmap->date = $this->roadmap_date;

        $roadmap->save();

        $this->reset('roadmap_id', 'roadmap_name', 'roadmap_client', 'roadmap_chief', 'roadmap_date');
    }
    public function delete_roadmap(){
        $roadmap = ModelsRoadmap::find($this->roadmap_id);
        $roadmap->delete();
    }

    // Sprint

    public $sprint_name, $sprint_description, $sprint_order, $sprint_start_date, $sprint_end_date;
    public $sprint_id=0, $sprint_form=0;

    public function store_sprint()
    {
        Sprint::create([
            'roadmap_id' => $this->roadmap->id,
            'name' => $this->sprint_name,
            'description' => $this->sprint_description,
            'order' => $this->sprint_order,
            'start_date' => $this->sprint_start_date,
            'end_date' => $this->sprint_end_date
        ]);
        $this->emit('sprintAdded');
        $this->reset('sprint_name', 'sprint_description', 'sprint_order', 'sprint_start_date', 'sprint_end_date');
    }
    public function edit_sprint($id)
    {
        $this->sprint_id = $id;
        $sprint = Sprint::find($id);
        $this->sprint_name          = $sprint->name;
        $this->sprint_description   = $sprint->description;
        $this->sprint_order         = $sprint->order;
        $this->sprint_start_date    = $sprint->start_date;
        $this->sprint_end_date      = $sprint->end_date;
    }
    public function update_sprint()
    {
        $sprint = Sprint::find($this->sprint_id);
        $sprint->name           = $this->sprint_name;
        $sprint->description    = $this->sprint_description;
        $sprint->order          = $this->sprint_order;
        $sprint->start_date     = $this->sprint_start_date;
        $sprint->end_date       = $this->sprint_end_date;

        $sprint->save();

        $this->reset('sprint_id', 'sprint_name', 'sprint_description', 'sprint_order', 'sprint_start_date', 'sprint_end_date');
    }
    public function delete_sprint($id){
        $sprint = Sprint::find($id);
        $sprint->delete();
    }

    // Jalon

    public $jalon_order, $jalon_description, $jalon_start_date, $jalon_end_date, $jalon_duration, $jalon_avancement;
    public $jalon_id=0, $jalon_form=0, $jalon_count=0;

    public function store_jalon($id)
    {
        Jalon::create([
            'sprint_id' => $id,
            'order' => $this->jalon_order,
            'description' => $this->jalon_description,
            'start_date' => $this->jalon_start_date,
            'end_date' => $this->jalon_end_date,
            'duration' => $this->jalon_duration,
            'avancement' => $this->jalon_avancement,
        ]);
        $this->emit('jalon');
        $this->reset('sprint_id', 'jalon_order', 'jalon_description', 'jalon_start_date', 'jalon_end_date', 'jalon_duration', 'jalon_avancement');
    }
    public function edit_jalon($id)
    {
        $this->jalon_id = $id;
        $jalon = Jalon::find($id);

        $this->jalon_order = $jalon->order;
        $this->jalon_description = $jalon->description;
        $this->jalon_start_date = $jalon->start_date;
        $this->jalon_end_date = $jalon->end_date;
        $this->jalon_duration = $jalon->duration;
        $this->jalon_avancement = $jalon->avancement;
    }
    public function update_jalon()
    {
        $jalon = Jalon::find($this->jalon_id);
        $jalon->order = $this->jalon_order;
        $jalon->description = $this->jalon_description;
        $jalon->start_date = $this->jalon_start_date;
        $jalon->end_date = $this->jalon_end_date;
        $jalon->duration = $this->jalon_duration;
        if ($this->jalon_avancement>=0 && $this->jalon_avancement <= 100) {
            $jalon->avancement = $this->jalon_avancement;
        }

        $jalon->save();
        $this->emit('jalon');
        $this->reset('jalon_id', 'jalon_order', 'jalon_description', 'jalon_start_date', 'jalon_end_date', 'jalon_duration', 'jalon_avancement');
    }
    public function delete_jalon(){
        $jalon = Jalon::find($this->jalon_id);
        $jalon->delete();
    }

    public function set_sprint_id($id)
    {
        $this->sprint_id = $id;
        $sprint = Sprint::find($id);
        $this->jalon_order = $sprint->jalons->count() +1;
    }

}
