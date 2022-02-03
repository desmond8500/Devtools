<?php

use App\Http\Controllers\DiagrammeController;
use App\Http\Livewire\Index;
use App\Http\Livewire\Projet;
use App\Http\Livewire\Projets;
use App\Http\Livewire\Tabler\Login;
use App\Http\Livewire\Tabler\Register;
use App\Models\Diagramme;
use Illuminate\Support\Facades\Route;

// Route::get('/', Index::class)->name('index');
Route::get('/', Projets::class)->name('index');
Route::get('/projets', Projets::class)->name('projets');
Route::get('/projet/{projet_id}', Projet::class)->name('projet');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/mermaid', function () {
    return view('livewire.tabler.database');
});
Route::get('/diagramme/{id}', function ($id) {
    $diagramme = Diagramme::find($id);
    return view('diagramme')->with('diagramme', $diagramme);
})->name('diagramme');

// Route::get('/diagramme/{id}', [DiagrammeController::class, 'index'])->name('diagramme');
