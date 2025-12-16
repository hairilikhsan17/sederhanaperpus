@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Mahasiswa</h1>
    <form action="{{ route('petugas.mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $mahasiswa->jurusan }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('petugas.mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
