<?php

namespace App\Http\Livewire\Tutos;

use App\Models\Tutoriel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Spatie\Tags\Tag;

class Index extends Component
{
    public $file, $file_id, $categorie;

    public function mount($file_id=null, $categorie=null)
    {
        $this->file_id = $file_id;
        $this->categorie = $categorie;
        $this->getFile();
    }
    public function render()
    {
        return view('livewire.tutos.index',[
            "list" => Tutoriel::withAnyTags($this->categorie)->get(),
            "tags" => Tag::all(),
            "file" => $this->file,
        ])->extends('tutos.layout')->section('content');
    }

    public function getFile()
    {
        if ($this->file_id) {
            $file = Tutoriel::find($this->file_id);
            $content = file_get_contents("tutos/$file->folder");
            $this->file = $content;
        }else{
            $this->file = null;
        }
    }
}
