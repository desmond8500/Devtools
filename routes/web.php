<?php

use App\Http\Livewire\Index;
use App\Http\Livewire\Projet;
use App\Http\Livewire\Projets;
use App\Http\Livewire\Tabler\Login;
use App\Http\Livewire\Tabler\Register;
use Illuminate\Support\Facades\Route;

// Route::get('/', Index::class)->name('index');
Route::get('/', Projets::class)->name('index');
Route::get('/projets', Projets::class)->name('projets');
Route::get('/projet/{projet_id}', Projet::class)->name('projet');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
