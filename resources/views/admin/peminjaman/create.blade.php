@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('admin.peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                <option value="">Pilih Mahasiswa</option>
                @foreach($mahasiswa as $mhs)
                <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="buku_id" class="form-label">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control">
                <option value="">Pilih Buku</option>
                @foreach($buku as $bk)
                <option value="{{ $bk->id }}">{{ $bk->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Pinjam">Pinjam</option>
                <option value="Kembali">Kembali</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Tambahkan keterangan..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
