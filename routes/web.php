<?php

use App\Http\Livewire\Tutos\Index;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('tutos.index');
// });


Route::get('/{folder?}/{md?}', Index::class)->name('index');
