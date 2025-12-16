@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Edit Peminjaman</h1>
    <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                @foreach($mahasiswa as $mhs)
                <option value="{{ $mhs->id }}" {{ $peminjaman->mahasiswa_id == $mhs->id ? 'selected' : '' }}>
                    {{ $mhs->nama }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="buku_id" class="form-label">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control">
                @foreach($buku as $bk)
                <option value="{{ $bk->id }}" {{ $peminjaman->buku_id == $bk->id ? 'selected' : '' }}>
                    {{ $bk->judul }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Pinjam" {{ $peminjaman->status == 'Pinjam' ? 'selected' : '' }}>Pinjam</option>
                <option value="Kembali" {{ $peminjaman->status == 'Kembali' ? 'selected' : '' }}>Kembali</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $peminjaman->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
