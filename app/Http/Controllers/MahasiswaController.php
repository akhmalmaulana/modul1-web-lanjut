<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('matakuliah')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }
    
    public function create()
    {
        $data_mk = Matakuliah::all();
        return view('mahasiswa.create', compact('data_mk'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|max:20',
            'nama' => 'required|max:100',
            'kelas' => 'required|max:10',
            'matakuliah_id' => 'nullable|exists:matakuliahs,id'
        ]);
        
        Mahasiswa::create($request->all());
        
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan');
    }
    
    public function edit(Mahasiswa $mahasiswa)
    {
        $data_mk = Matakuliah::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'data_mk'));
    }
    
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|max:20|unique:mahasiswas,nim,' . $mahasiswa->nim . ',nim',
            'nama' => 'required|max:100',
            'kelas' => 'required|max:10',
            'matakuliah_id' => 'nullable|exists:matakuliahs,id'
        ]);
        
        $mahasiswa->update($request->all());
        
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil diupdate');
    }
    
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus');
    }
}