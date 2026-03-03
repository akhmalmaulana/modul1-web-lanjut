<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Menampilkan daftar mata kuliah
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }
    
    // Menampilkan form tambah mata kuliah
    public function create()
    {
        return view('matakuliah.create');
    }
    
    // Menyimpan data mata kuliah baru (dengan validasi)
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk|max:10',
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6'
        ]);
        
        Matakuliah::create($request->all());
        
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan');
    }
    
    // Menampilkan detail mata kuliah dan mahasiswa yang mengambil
    public function show(Matakuliah $matakuliah)
    {
        // Load mahasiswa yang terkait
        $matakuliah = Matakuliah::with('mahasiswa')->findOrFail($kode_mk);
        return view('matakuliah.show', compact('matakuliah'));
    }
    
    // Menampilkan form edit mata kuliah
    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }
    
    // Mengupdate data mata kuliah (dengan validasi)
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'kode_mk' => 'required|max:10|unique:matakuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6'
        ]);
        
        $matakuliah->update($request->all());
        
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diupdate');
    }
    
    // Menghapus mata kuliah
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}