@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mahasiswa</h2>
    
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Kelas:</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Mata Kuliah:</label>
            <select name="matakuliah_id" class="form-control">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($data_mk as $mk)
                    <option value="{{ $mk->id }}">
                        {{ $mk->kode_mk }} - {{ $mk->nama_mk }} ({{ $mk->sks }} SKS)
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection