<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // =========================
    // TAMPIL SEMUA DATA
    // =========================
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // =========================
    // FORM TAMBAH DATA
    // =========================
    public function create()
    {
        $matakuliahs = Matakuliah::all();
        return view('mahasiswa.create', compact('matakuliahs'));
    }

    // =========================
    // SIMPAN DATA BARU
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ]);

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    // =========================
    // FORM EDIT DATA
    // =========================
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $matakuliahs = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'matakuliahs'));
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $nim)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
