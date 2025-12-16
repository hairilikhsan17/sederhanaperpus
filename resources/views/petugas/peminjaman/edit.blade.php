@extends('layouts.master')

@section('content')
<h1>Edit Peminjaman</h1>
<form action="{{ route('petugas.peminjaman.update', $peminjaman) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
        <select name="mahasiswa_id" id="mahasiswa_id" class="form-select">
            @foreach($mahasiswas as $mahasiswa)
            <option value="{{ $mahasiswa->id }}" 
                {{ $peminjaman->mahasiswa_id == $mahasiswa->id ? 'selected' : '' }}>
                {{ $mahasiswa->nama }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="buku_id" class="form-label">Buku</label>
        <select name="buku_id" id="buku_id" class="form-select">
            @foreach($bukus as $buku)
            <option value="{{ $buku->id }}" 
                {{ $peminjaman->buku_id == $buku->id ? 'selected' : '' }}>
                {{ $buku->judul }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="Pinjam" {{ $peminjaman->status == 'Pinjam' ? 'selected' : '' }}>Pinjam</option>
            <option value="Kembali" {{ $peminjaman->status == 'Kembali' ? 'selected' : '' }}>Kembali</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
