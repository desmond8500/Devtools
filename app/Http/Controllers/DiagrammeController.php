<?php

namespace App\Http\Controllers;

use App\Models\Diagramme;
use Illuminate\Http\Request;

class DiagrammeController extends Controller
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function index($id)
    {
        $diagramme = Diagramme::find($id);
        return view('diagramme')
            ->with('name', $diagramme->name)
            ->with('content', $diagramme->content)
            ->with('dsecription', $diagramme->description)

        ;
    }
}
