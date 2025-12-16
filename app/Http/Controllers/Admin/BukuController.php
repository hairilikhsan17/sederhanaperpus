<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $bukus = Buku::all(); // Mendapatkan semua buku
        return view('admin.buku.index', compact('bukus'));
    }

    // Menampilkan form untuk menambahkan buku
    public function create()
    {
        return view('admin.buku.create');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit buku
    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', compact('buku'));
    }

    // Mengupdate data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer',
        ]);

        $buku->update($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diupdate');
    }

    // Menghapus data buku
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
