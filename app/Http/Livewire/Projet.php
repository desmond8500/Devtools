<?php

namespace App\Http\Livewire;

use App\Models\Acteur;
use App\Models\Projet as ModelsProjet;
use App\Models\Team;
use Livewire\Component;

class Projet extends Component
{
    public $projet_id;

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;

        $this->tabs = array(
            array('number'=> 1, 'name' => 'Présentation',          'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline> <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path> <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path> </svg>'),
            array('number'=> 2, 'name' => 'Description détaillée', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path> <line x1="9" y1="9" x2="10" y2="9"></line> <line x1="9" y1="13" x2="15" y2="13"></line> <line x1="9" y1="17" x2="15" y2="17"></line> </svg>'),
            array('number'=> 3, 'name' => 'Base de donnée',        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse> <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path> <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path> </svg>'),
            array('number' => 4, 'name'=> 'Roadmap',               'icon'=> '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <rect x="4" y="5" width="16" height="16" rx="2"></rect> <line x1="16" y1="3" x2="16" y2="7"></line> <line x1="8" y1="3" x2="8" y2="7"></line> <line x1="4" y1="11" x2="20" y2="11"></line> <line x1="10" y1="16" x2="14" y2="16"></line> </svg>'),
            array('number' => 5, 'name'=> 'Ressources',            'icon'=> '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5"></path> <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5"></path> </svg>'),
            // array('number'=> 0,'name'=> '', 'icon'=> ''),
        );
    }
    public function render()
    {
        return view('livewire.projet',[
            'projet' => ModelsProjet::find($this->projet_id),
        ]);
    }

    // Tabs
    public $tab_selected=2;
    public $tabs;

    public function set_tab($number)
    {
        $this->tab_selected = $number;
    }

}
