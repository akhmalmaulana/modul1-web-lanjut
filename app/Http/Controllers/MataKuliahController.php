<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        return view('matkul', [
            'matkul' => 'Pemrograman Web Lanjut',
            'dosen_pengajar' => 'Rudi Kurniawan, MT',
            'jumlah_sks' => 3
        ]);
    }
}
