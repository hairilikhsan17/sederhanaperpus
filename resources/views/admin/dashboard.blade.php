@extends('layouts.master')

@section('content')
    <!-- Judul dan Deskripsi -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-primary">Kelola Pengguna</h1>
                <p class="lead text-muted">Ini adalah halaman admin untuk mengelola pengguna.</p>
            </div>
        </div>

        <!-- Kartu (Card) untuk 4 Item -->
        <div class="row mt-4">
            <!-- Kartu User -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle display-4 text-primary mb-3"></i>
                        <h5 class="card-title">User</h5>
                        <p class="card-text">Kelola data pengguna sistem dengan mudah.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Mahasiswa -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-person-lines-fill display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Mahasiswa</h5>
                        <p class="card-text">Manajemen data mahasiswa yang terdaftar.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Buku -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-book display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Buku</h5>
                        <p class="card-text">Kelola koleksi buku yang tersedia.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Peminjam -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-person-check display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Peminjam</h5>
                        <p class="card-text">Kelola data peminjam buku dengan mudah.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
