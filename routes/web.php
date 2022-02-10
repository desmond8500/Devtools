<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Projet;
use App\Http\Livewire\Projets;
use App\Http\Livewire\Tabler\Login;
use App\Http\Livewire\Tabler\Register;
use App\Models\Diagramme;
use Illuminate\Support\Facades\Route;

Route::get('/register', Register::class)->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/connexion', [AuthController::class, 'connexion'])->name('connexion');
Route::post('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Projets::class)->name('index');
    Route::get('/projets', Projets::class)->name('projets');
    Route::get('/projet/{projet_id}', Projet::class)->name('projet');

    Route::get('/mermaid', function () {
        return view('livewire.tabler.database');
    });
    Route::get('/diagramme/{id}', function ($id) {
        $diagramme = Diagramme::find($id);
        return view('diagramme')->with('diagramme', $diagramme);
    })->name('diagramme');

});


