<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Mahasiswa;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        // Mengambil semua data peminjaman dengan relasi mahasiswa dan buku
        $peminjamans = Peminjaman::with('mahasiswa', 'buku')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Form tambah peminjaman
    public function create()
    {
        // Mengambil data mahasiswa dan buku untuk dropdown
        $mahasiswa = Mahasiswa::all();
        $buku = Buku::all();
        return view('admin.peminjaman.create', compact('mahasiswa', 'buku'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'status' => 'required|in:Pinjam,Kembali',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'keterangan' => 'nullable|string|max:255', // Validasi kolom keterangan
        ]);

        // Simpan data peminjaman
        Peminjaman::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'buku_id' => $request->buku_id,
            'status' => $request->status,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'keterangan' => $request->keterangan,  // Pastikan kolom keterangan disertakan
        ]);

        return redirect()->route('admin.peminjaman.index')
                         ->with('success', 'Peminjaman berhasil dibuat!');
    }

    // Form edit peminjaman
    public function edit($id)
    {
        // Mengambil data peminjaman, mahasiswa, dan buku
        $peminjaman = Peminjaman::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $buku = Buku::all();
        return view('admin.peminjaman.edit', compact('peminjaman', 'mahasiswa', 'buku'));
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'status' => 'required|in:Pinjam,Kembali',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'keterangan' => 'nullable|string|max:255', // Validasi kolom keterangan
        ]);

        // Update data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'buku_id' => $request->buku_id,
            'status' => $request->status,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'keterangan' => $request->keterangan,  // Pastikan kolom keterangan disertakan
        ]);

        return redirect()->route('admin.peminjaman.index')
                         ->with('success', 'Peminjaman berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy($id)
    {
        // Hapus data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')
                         ->with('success', 'Peminjaman berhasil dihapus!');
    }

    // Filter data peminjaman
    public function filter(Request $request)
    {
        // Query awal
        $query = Peminjaman::query();

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

        // Filter berdasarkan keterangan
        if ($request->filled('keterangan')) {
            $query->where('keterangan', 'like', '%' . $request->keterangan . '%');
        }

        // Ambil data yang sudah difilter
        $peminjamans = $query->with('mahasiswa', 'buku')->get();

        // Tampilkan hasil filter di view filter
        return view('admin.peminjaman.filter', compact('peminjamans'));
    }
}
