<!DOCTYPE html>
<html>
<head>
    <title>CRUD Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD Akademik</a>

        <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('mahasiswa*') ? 'fw-bold text-warning' : 'text-white' }}"
                   href="{{ route('mahasiswa.index') }}">
                    Mahasiswa
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('matakuliah*') ? 'fw-bold text-warning' : 'text-white' }}"
                   href="{{ route('matakuliah.index') }}">
                    Mata Kuliah
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
