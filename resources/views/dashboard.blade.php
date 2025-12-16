<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .sidebar .profile-name {
            color: white;
            font-size: 1.2rem;
            padding-left: 15px;
            margin-bottom: 20px;
        }
        .sidebar .line {
            border-top: 1px solid #6c757d;
            margin: 20px 0;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="d-flex">
                <!-- Logout Form -->
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Profile Name -->
        <div class="profile-name">
            {{ Auth::user()->name }}
        </div>
        
        <!-- Garis Pemisah -->
        <div class="line"></div>

        <!-- Sidebar Menu berdasarkan Role -->
        @if(Auth::user()->role == 'admin')
            <!-- Admin Sidebar Links -->
            <a href="{{ url('admin/users') }}">User</a>
            <a href="{{ url('admin/mahasiswa') }}">Mahasiswa</a>
            <a href="{{ url('admin/buku') }}">Buku</a>
            <a href="{{ url('admin/peminjam') }}">Peminjam</a>
        @elseif(Auth::user()->role == 'mahasiswa')
            <!-- Mahasiswa Sidebar Links -->
            <a href="{{ url('mahasiswa/dashboard') }}">Mahasiswa</a>
            <a href="{{ url('mahasiswa/meminjam') }}">Mulai Meminjam Buku</a>
        @endif
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Greeting Message, Always Visible -->
        <div id="greeting">
            <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
            <p>Ini adalah halaman dashboard Anda.</p>
        </div>

        <!-- Placeholder for the content that will be loaded dynamically -->
        <div id="contentArea">
            <!-- Konten dinamis berdasarkan role akan dimuat di sini -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

