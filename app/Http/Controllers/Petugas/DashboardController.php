<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }

    public function mahasiswa()
    {
        // Logika untuk menampilkan data mahasiswa
        return view('petugas.mahasiswa'); // Pastikan file view ini ada
    }
}
