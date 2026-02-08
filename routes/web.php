<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LatihanController;

/*
|--------------------------------------------------------------------------
| Route Dasar
|--------------------------------------------------------------------------
*/

// Redirect default ke Mahasiswa
Route::get('/', function () {
    return redirect('/mahasiswa');
});

/*
|--------------------------------------------------------------------------
| Route Welcome
|--------------------------------------------------------------------------
*/

Route::get('/welcome', [WelcomeController::class, 'welcome']);

/*
|--------------------------------------------------------------------------
| Route Latihan & Mata Kuliah
|--------------------------------------------------------------------------
*/

Route::get('/latihan', [LatihanController::class, 'index']);
Route::get('/matkul', [MataKuliahController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Route Mahasiswa (CRUD FULL)
|--------------------------------------------------------------------------
*/

Route::resource('mahasiswa', MahasiswaController::class)
    ->parameters(['mahasiswa' => 'id']);
