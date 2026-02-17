@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-warning">
        <h4>Edit Data Mahasiswa</h4>
    </div>

    <div class="card-body">

        {{-- Menampilkan Error Validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control"
                       value="{{ $mahasiswa->nim }}" disabled>
                <small class="text-muted">NIM tidak dapat diubah</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama"
                       class="form-control"
                       value="{{ old('nama', $mahasiswa->nama) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas"
                       class="form-control"
                       value="{{ old('kelas', $mahasiswa->kelas) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <input type="text" name="matakuliah"
                       class="form-control"
                       value="{{ old('matakuliah', $mahasiswa->matakuliah) }}">
            </div>

            <button type="submit" class="btn btn-success">
                Update
            </button>

            <a href="{{ route('mahasiswa.index') }}"
               class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>
</div>

@endsection
