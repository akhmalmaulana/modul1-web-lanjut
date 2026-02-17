<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan semua data mata kuliah
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Menampilkan form tambah data
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Menyimpan data ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk|max:10',
            'nama_mk' => 'required|min:3',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Mata Kuliah berhasil ditambahkan');
    }

    public function show(Matakuliah $matakuliah)
    {
        $matakuliah->load('mahasiswas');
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Mengupdate data
     */
    public function update(Request $request, $kode_mk)
    {
        $request->validate([
            'nama_mk' => 'required|min:3',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8'
        ]);

        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Mata Kuliah berhasil diperbarui');
    }

    /**
     * Menghapus data
     */
    public function destroy($kode_mk)
    {
        Matakuliah::destroy($kode_mk);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Mata Kuliah berhasil dihapus');
    }
}
