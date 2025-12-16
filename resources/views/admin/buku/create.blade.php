@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>
    <form action="{{ route('admin.buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
