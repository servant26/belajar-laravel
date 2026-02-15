<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama (opsional, redirect ke people)
Route::get('/', function () {
    return redirect()->route('people.index');
});

// Route resource untuk Person (otomatis buat semua route CRUD)
Route::resource('people', PersonController::class);