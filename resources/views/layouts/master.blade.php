<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Navbar - Fixed at top, full width */
        .navbar {
            background-color: #005f73;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            z-index: 10;
            border-radius: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar .bi-box-arrow-right {
            font-size: 1.5rem;
            color: #ffffff;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .navbar .bi-box-arrow-right:hover {
            color: #f8d210;
            transform: scale(1.2);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 56px; /* Add space for navbar */
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #008891;
            color: white;
            border-radius: 0 10px 10px 0;
            padding-top: 20px;
            z-index: 5;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .sidebar a:hover {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: #ffffff;
            transform: scale(1.1);
        }
        .sidebar a i {
            margin-right: 10px;
            font-size: 1.3rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            margin-top: 56px; /* Add space for navbar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <form id="logoutForm" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" style="border: none; background: none; padding: 0;">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <h5 class="px-3">Hai, {{ Auth::user()->name }}</h5>
            <hr class="bg-light">
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> Home</a>
                <a href="{{ route('admin.users.index') }}"><i class="bi bi-person-circle"></i> Users</a>
                <a href="{{ route('admin.mahasiswa.index') }}"><i class="bi bi-person-lines-fill"></i> Mahasiswa</a>
                <a href="{{ route('admin.buku.index') }}"><i class="bi bi-book"></i> Buku</a>
                <a href="{{ route('admin.peminjaman.index') }}"><i class="bi bi-arrow-repeat"></i> Peminjam</a>
            @elseif(Auth::user()->role == 'petugas')
                <a href="{{ route('petugas.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard Petugas</a>
                <a href="{{ route('petugas.peminjaman.index') }}"><i class="bi bi-arrow-repeat"></i> Peminjaman</a>
                <a href="{{ route('petugas.mahasiswa.index') }}"><i class="bi bi-person-lines-fill"></i> Mahasiswa</a>
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
