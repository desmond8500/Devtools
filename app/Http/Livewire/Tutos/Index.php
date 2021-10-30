<?php

namespace App\Http\Livewire\Tutos;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    public $folder, $files, $md, $subfolders;

    public function mount($folder = null, $md=null)
    {
        $this->folder = $folder;
        $this->md = $md;
    }
    public function render()
    {
        return view('livewire.tutos.index',[
            "files" => $this->getFiles(),
            "parsed" => $this->parsed(),
            "subfolders" => $this->subfolders,
        ])->extends('tutos.layout')->section('content');
    }

    public function getFiles()
    {
        $this->files = Storage::disk("tutos")->files("$this->folder");
    }
    public function parsed()
    {
        if ($this->folder && $this->md) {
            return file_get_contents("tutos/$this->folder/$this->md");
        }else {
            return null;
        }
    }
}
