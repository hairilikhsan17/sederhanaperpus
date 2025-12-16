<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Mahasiswa;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar untuk mengambil data peminjaman
        $query = Peminjaman::with(['mahasiswa', 'buku']);

        // Filter berdasarkan nama mahasiswa
        if ($request->filled('nama')) {
            $query->whereHas('mahasiswa', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        // Filter berdasarkan tanggal pinjam
        if ($request->filled('tanggal_pinjam')) {
            $query->whereDate('tanggal_pinjam', $request->tanggal_pinjam);
        }

        // Filter berdasarkan tanggal kembali
        if ($request->filled('tanggal_kembali')) {
            $query->whereDate('tanggal_kembali', $request->tanggal_kembali);
        }

        // Ambil data setelah filter
        $peminjamans = $query->get();

        return view('petugas.peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all(); // Ambil semua mahasiswa untuk dropdown
        $bukus = Buku::all();          // Ambil semua buku untuk dropdown
        return view('petugas.peminjaman.create', compact('mahasiswas', 'bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'status' => 'required|in:Pinjam,Kembali',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('petugas.peminjaman.index')
            ->with('status', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $mahasiswas = Mahasiswa::all();
        $bukus = Buku::all();
        return view('petugas.peminjaman.edit', compact('peminjaman', 'mahasiswas', 'bukus'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'status' => 'required|in:Pinjam,Kembali',
            'tanggal_pinjam' => 'required|date',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('petugas.peminjaman.index')
            ->with('status', 'Peminjaman berhasil diperbarui!');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('petugas.peminjaman.index')
            ->with('status', 'Peminjaman berhasil dihapus!');
    }
    
    //UNTUK FUNGSI FILTER
    public function filter(Request $request)
    {
    $query = Peminjaman::with(['mahasiswa', 'buku']);

    // Filter berdasarkan nama mahasiswa
    if ($request->filled('nama')) {
        $query->whereHas('mahasiswa', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->nama . '%');
        });
    }

    // Filter berdasarkan tanggal pinjam
    if ($request->filled('tanggal_pinjam')) {
        $query->whereDate('tanggal_pinjam', $request->tanggal_pinjam);
    }

    // Filter berdasarkan tanggal kembali
    if ($request->filled('tanggal_kembali')) {
        $query->whereDate('tanggal_kembali', $request->tanggal_kembali);
    }

    $peminjamans = $query->get();

    // Arahkan ke filter.blade.php
    return view('petugas.peminjaman.filter', compact('peminjamans'));
}

}
