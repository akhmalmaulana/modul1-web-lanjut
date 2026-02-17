@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                {{-- NIM --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">NIM</label>
                    <input type="text" 
                           name="nim"
                           class="form-control"
                           value="{{ old('nim') }}"
                           placeholder="Masukkan NIM">
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text" 
                           name="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           placeholder="Masukkan Nama Mahasiswa">
                </div>

                {{-- Kelas --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kelas</label>
                    <input type="text" 
                           name="kelas"
                           class="form-control"
                           value="{{ old('kelas') }}"
                           placeholder="Masukkan Kelas">
                </div>

                {{-- Mata Kuliah (Dropdown dari tabel matakuliahs) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mata Kuliah</label>
                    <select name="matakuliah" class="form-select">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($matakuliahs as $mk)
                            <option value="{{ $mk->nama_mk }}"
                                {{ old('matakuliah') == $mk->nama_mk ? 'selected' : '' }}>
                                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>

                    <a href="{{ route('mahasiswa.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
