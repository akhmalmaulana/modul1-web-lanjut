<!DOCTYPE html>
<html>
<head>
    <title>Detail Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Detail Mata Kuliah</h2>
        
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="200">Kode Mata Kuliah</th>
                        <td>{{ $matakuliah->kode_mk }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>{{ $matakuliah->nama_mk }}</td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>{{ $matakuliah->sks }}</td>
                    </tr>
                </table>
                
                <h4 class="mt-4">Daftar Mahasiswa yang Mengambil MK Ini</h4>
                @if($matakuliah->mahasiswas->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matakuliah->mahasiswas as $mhs)
                            <tr>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->kelas }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">Belum ada mahasiswa yang mengambil mata kuliah ini.</p>
                @endif
                
                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>