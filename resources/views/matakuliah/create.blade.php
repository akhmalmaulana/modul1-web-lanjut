@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-journal-plus"></i> Tambah Mata Kuliah
                </h4>
            </div>

            <div class="card-body p-4">

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

                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kode MK</label>
                        <input type="text" name="kode_mk"
                               class="form-control"
                               value="{{ old('kode_mk') }}"
                               placeholder="Contoh: IF101">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk"
                               class="form-control"
                               value="{{ old('nama_mk') }}"
                               placeholder="Contoh: Pemrograman Web">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">SKS (1–6)</label>
                        <input type="number" name="sks"
                               class="form-control"
                               min="1" max="6"
                               value="{{ old('sks') }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Semester</label>
                        <input type="number" name="semester"
                               class="form-control"
                               min="1" max="8"
                               value="{{ old('semester') }}">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save"></i> Simpan
                        </button>

                        <a href="{{ route('matakuliah.index') }}"
                           class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
