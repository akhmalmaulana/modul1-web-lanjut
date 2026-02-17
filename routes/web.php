<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\LatihanController;

/*
|--------------------------------------------------------------------------
| Route Dasar
|--------------------------------------------------------------------------
*/

// Redirect default ke Mahasiswa
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

/*
|--------------------------------------------------------------------------
| Route Welcome
|--------------------------------------------------------------------------
*/

Route::get('/welcome', [WelcomeController::class, 'welcome']);

/*
|--------------------------------------------------------------------------
| Route Latihan
|--------------------------------------------------------------------------
*/

Route::get('/latihan', [LatihanController::class, 'index']);

/*
|--------------------------------------------------------------------------
| CRUD Mahasiswa
|--------------------------------------------------------------------------
*/

Route::resource('mahasiswa', MahasiswaController::class);

/*
|--------------------------------------------------------------------------
| CRUD Mata Kuliah
|--------------------------------------------------------------------------
*/

Route::resource('matakuliah', MatakuliahController::class);
