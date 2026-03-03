<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==============================
// HALAMAN DEPAN (TANPA LOGIN)
// ==============================

Route::get('/', function () {
    return view('welcome');
});


// ==============================
// ROUTE YANG BUTUH LOGIN
// ==============================

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {

        $totalMahasiswa  = Mahasiswa::count();
        $totalMatakuliah = Matakuliah::count();

        return view('dashboard', compact(
            'totalMahasiswa',
            'totalMatakuliah'
        ));

    })->name('dashboard');


    // ==============================
    // MAHASISWA
    // ==============================

    Route::resource('mahasiswa', MahasiswaController::class)
        ->except(['destroy']);

    Route::delete('mahasiswa/{mahasiswa}',
        [MahasiswaController::class, 'destroy'])
        ->name('mahasiswa.destroy')
        ->middleware('check.email');


    // ==============================
    // MATAKULIAH
    // ==============================

    Route::resource('matakuliah', MatakuliahController::class);
});


// ==============================
// PROFILE (BREEZE)
// ==============================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// ==============================
// AUTH BREEZE (WAJIB PALING BAWAH)
// ==============================

require __DIR__.'/auth.php';