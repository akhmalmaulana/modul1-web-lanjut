<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Resource untuk Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

// Route Resource untuk Matakuliah
Route::resource('matakuliah', MatakuliahController::class);