@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Edit Mata Kuliah
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

                <form action="{{ route('matakuliah.update', $matakuliah->kode_mk) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kode MK</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $matakuliah->kode_mk }}"
                               disabled>
                        <small class="text-muted">Kode tidak dapat diubah</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Mata Kuliah</label>
                        <input type="text"
                               name="nama_mk"
                               class="form-control"
                               value="{{ old('nama_mk', $matakuliah->nama_mk) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">SKS (1–6)</label>
                        <input type="number"
                               name="sks"
                               class="form-control"
                               min="1" max="6"
                               value="{{ old('sks', $matakuliah->sks) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Semester</label>
                        <input type="number"
                               name="semester"
                               class="form-control"
                               min="1" max="8"
                               value="{{ old('semester', $matakuliah->semester) }}">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save"></i> Update
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
