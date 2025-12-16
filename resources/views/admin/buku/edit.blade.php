@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
