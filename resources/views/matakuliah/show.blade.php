<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4>Detail Mata Kuliah</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                            <tr>
                                <th>Semester</th>
                                <td>{{ $matakuliah->semester }}</td>
                            </tr>
                        </table>

                        <h5 class="mt-4">Daftar Mahasiswa yang Mengambil</h5>
                        @if($matakuliah->mahasiswas->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matakuliah->mahasiswas as $index => $mhs)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->kelas }}</td>
                                        <td>{{ $mhs->pivot->nilai ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Belum ada mahasiswa yang mengambil mata kuliah ini.</p>
                        @endif

                        <div class="mt-3">
                            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('matakuliah.edit', $matakuliah->kode_mk) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>