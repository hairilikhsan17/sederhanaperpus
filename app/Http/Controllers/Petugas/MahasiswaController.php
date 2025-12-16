<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Mengambil semua data mahasiswa
        $mahasiswas = Mahasiswa::all(); // Perbaiki variabel $mahasiswa menjadi $mahasiswas
        return view('petugas.mahasiswa.index', compact('mahasiswas')); // Mengirim data ke view
    }

    public function create()
    {
        return view('petugas.mahasiswa.create'); // Menampilkan form create
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'jurusan' => 'required',
            
        ]);

        // Menyimpan data mahasiswa
        Mahasiswa::create($request->all());

        return redirect()->route('petugas.mahasiswa.index')->with('status', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('petugas.mahasiswa.edit', compact('mahasiswa')); // Menampilkan form edit
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan' => 'required',
            
        ]);

        // Update data mahasiswa
        $mahasiswa->update($request->all());

        return redirect()->route('petugas.mahasiswa.index')->with('status', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        // Menghapus data mahasiswa
        $mahasiswa->delete();

        return redirect()->route('petugas.mahasiswa.index')->with('status', 'Mahasiswa berhasil dihapus!');
    }
}
