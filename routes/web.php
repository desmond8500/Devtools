<?php

use App\Http\Livewire\Tutos\Index;
use Illuminate\Support\Facades\Route;

// Route::get('/{folder?}/{md?}', Index::class)->name('index');
Route::get('/{file_id?}/{categorie?}', Index::class)->name('index');
// Route::get('/', Index::class)->name('index');
