<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk sidebar */
        .sidebar {
            position: fixed; /* Menjaga sidebar tetap di tempat */
            top: 56px; /* Sesuaikan dengan tinggi navbar */
            bottom: 0; /* Mengisi dari atas hingga bawah */
            left: 0; /* Posisi di kiri */
            width: 250px; /* Lebar sidebar */
            background-color: #343a40; /* Warna latar belakang */
            color: white; /* Warna teks */
            overflow-y: auto; /* Scroll jika konten terlalu tinggi */
        }

        /* Tambahkan margin pada konten utama agar tidak tertutup oleh sidebar */
        .main-content {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding-top: 20px; /* Ruang atas untuk konten */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Admin</a>
            <form id="logoutForm" action="{{ route('auth.logout') }}" method="POST" class="d-flex">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-4">
            @if(Auth::check())
                <h4>{{ Auth::user()->name }}</h4>
                <hr>
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('users.index') }}" class="text-white">Daftar Pengguna</a><br>
                    <a href="{{ route('users.create') }}" class="text-white">Tambah Pengguna</a><br>
                @endif
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content p-4">
        @yield('content')
    </div>

    <!-- Tambahkan skrip Bootstrap jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
