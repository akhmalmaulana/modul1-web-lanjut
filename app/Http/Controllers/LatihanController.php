<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    /**
     * Menampilkan halaman welcome mahasiswa
     */
    public function index()
    {
        $data = [
            'nama' => 'Mahasiswa STMIK IKMI',
            'mata_kuliah' => 'Pemrograman Web Lanjut'
        ];

        return view('welcome_mahasiswa', $data);
    }
}
