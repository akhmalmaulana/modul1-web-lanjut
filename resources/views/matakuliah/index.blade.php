@extends('layouts.app') {{-- Jika pakai layout --}}

@section('content')
<div class="container">
    <h2>Daftar Mata Kuliah</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matakuliahs as $index => $mk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mk->kode_mk }}</td>
                <td>{{ $mk->nama_mk }}</td>
                <td>{{ $mk->sks }}</td>
                <td>{{ $mk->semester }}</td>
                <td>
                    {{-- PERBAIKAN: Ganti $mk->id MENJADI $mk->kode_mk --}}
                    <a href="{{ route('matakuliah.show', $mk->kode_mk) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('matakuliah.edit', $mk->kode_mk) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('matakuliah.destroy', $mk->kode_mk) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection