<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // ==============================
    // INDEX
    // ==============================
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['matakuliah', 'user'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // ==============================
    // CREATE
    // ==============================
    public function create()
    {
        $data_mk = Matakuliah::all();
        return view('mahasiswa.create', compact('data_mk'));
    }

    // ==============================
    // STORE
    // ==============================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $validated['user_id'] = auth()->id();

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // ==============================
    // EDIT
    // ==============================
    public function edit(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user_id !== auth()->id()) {
            abort(403);
        }

        $data_mk = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'data_mk'));
    }

    // ==============================
    // UPDATE
    // ==============================
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diupdate');
    }

    // ==============================
    // DESTROY
    // ==============================
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user_id !== auth()->id()) {
            abort(403);
        }

        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }
}