@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mt-4">Tambah Mahasiswa</h1>
    <form action="{{ route('petugas.mahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('petugas.mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
