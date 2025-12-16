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

        <!-- Kartu (Card) untuk 2 Item -->
        <div class="row mt-4">
            <!-- Kartu Peminjaman -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-arrow-repeat display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Peminjaman</h5>
                        <p class="card-text">Kelola data peminjaman buku dengan mudah.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Mahasiswa -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-person-lines-fill display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Mahasiswa</h5>
                        <p class="card-text">Manajemen data mahasiswa yang terdaftar.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
