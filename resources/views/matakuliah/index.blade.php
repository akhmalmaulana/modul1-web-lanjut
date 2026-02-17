<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD Akademik</a>

        <div>
            <ul class="navbar-nav me-auto d-flex flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('mahasiswa.index') }}">
                        Mahasiswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="{{ route('matakuliah.index') }}">
                        Mata Kuliah
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h2 class="mb-4">Data Mata Kuliah</h2>

            <a href="{{ route('matakuliah.create') }}" class="btn btn-success mb-3">
                + Tambah Mata Kuliah
            </a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matakuliahs as $mk)
                    <tr>
                        <td>{{ $mk->kode_mk }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->kode_mk) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('matakuliah.destroy', $mk->kode_mk) }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Data belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>
