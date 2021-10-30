<?php

namespace App\Http\Livewire\Tutos;

use App\Models\Tutoriel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Navbar extends Component
{

    public function render()
    {
        return view('livewire.tutos.navbar',[
            'menus'=> $this->getmenu(),
        ]);
    }

    public function getmenu()
    {
        // return Storage::disk('tutos')->files('');
        return Storage::disk('tutos')->directories();
    }
    public function init()
    {
        $files = Storage::disk("tutos")->AllFiles();
        foreach ($files as $key => $file) {
            $path = pathinfo($file);
            $tuto = Tutoriel::firstOrCreate([
                'name' => $path['filename'],
                'folder' => $file
            ]);

            $tags = explode("/", $path['dirname']);
            foreach ($tags as $key => $tag) {
                // $tuto->attachTag(strtolower($tag));
                // $tuto->attachTag(\Spatie\Tags\Tag::findOrCreate(strtolower($path['dirname'])));
                $tuto->attachTag(\Spatie\Tags\Tag::findOrCreate(strtolower($tag)));
            }
        }
    }
}
