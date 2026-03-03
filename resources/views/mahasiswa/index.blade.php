<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2>Daftar Mahasiswa</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
            Tambah Mahasiswa
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mata Kuliah</th>
                    <th>Diinput Oleh</th> {{-- Kolom baru --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mhs)
                    <tr>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->kelas }}</td>
                        <td>{{ optional($mhs->matakuliah)->nama_mk ?? 'MK tidak ditemukan' }}</td>
                        <td>{{ optional($mhs->user)->name ?? 'User tidak diketahui' }}</td> {{-- Tampilkan nama user --}}
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" 
                                  method="POST" 
                                  style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Yakin?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>