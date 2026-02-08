<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Metode 1: Menggunakan compact()
    public function index()
    {
        $namaMahasiswa = "Mahasiswa STMIK IKMI CIREBON";
        $mataKuliah = "Pemrograman Web Lanjut";
        $semester = "Semester 4";
        $dosen = "Rudi Kurniawan, MT";
        $kodeMK = "MDK-04001";
        
        // Mengirim data ke view menggunakan compact()
        return view('welcome', compact(
            'namaMahasiswa', 
            'mataKuliah', 
            'semester', 
            'dosen', 
            'kodeMK'
        ));
    }
    
    // Metode 2: Menggunakan array
    public function welcome()
    {
        $data = [
            'namaMahasiswa' => 'Mahasiswa STMIK IKMI CIREBON',
            'mataKuliah' => 'Pemrograman Web Lanjut',
            'semester' => 'Semester 4',
            'dosen' => 'Rudi Kurniawan, MT',
            'kodeMK' => 'MDK-04001',
            'sks' => 3,
            'hari' => 'Senin',
            'jam' => '08:00 - 10:30',
            'ruangan' => 'Aula'
        ];
        
        // Mengirim data ke view menggunakan with()
        return view('welcome')->with($data);
    }
    
    // Metode 3: Menggunakan with() langsung
    public function contohLain()
    {
        return view('welcome')
            ->with('namaMahasiswa', 'Mahasiswa STMIK IKMI CIREBON')
            ->with('mataKuliah', 'Pemrograman Web Lanjut')
            ->with('semester', 'Semester 4')
            ->with('dosen', 'Rudi Kurniawan, MT');
    }
    
    // Metode 4: Mengambil data dari Model/Database
    public function dariDatabase()
    {
        // Contoh jika mengambil dari model
        // $mataKuliah = MataKuliah::find(1);
        
        // Untuk contoh, kita buat data statis dulu
        $mataKuliahData = [
            'nama' => 'Pemrograman Web Lanjut',
            'kode' => 'MDK-04001',
            'sks' => 3,
            'dosen' => 'Rudi Kurniawan, MT'
        ];
        
        return view('welcome', [
            'mataKuliah' => $mataKuliahData,
            'namaMahasiswa' => 'Mahasiswa STMIK IKMI CIREBON'
        ]);
    }
}