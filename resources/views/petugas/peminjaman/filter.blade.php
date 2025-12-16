@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Data Peminjaman</h1>

    <!-- Form Filter -->
    <form action="{{ route('petugas.peminjaman.filter') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ request('nama') }}" placeholder="Cari Nama Mahasiswa">
            </div>

            <div class="col-md-4 mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam:</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ request('tanggal_pinjam') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ request('tanggal_kembali') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('petugas.peminjaman.filter') }}" class="btn btn-secondary">Reset</a>
    </form>

    <!-- Tabel Data Peminjaman -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mahasiswa</th>
                    <th>Buku</th>
                    <th>Status</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->mahasiswa->nama }}</td>
                    <td>{{ $peminjaman->buku->judul }}</td>
                    <td>{{ $peminjaman->status }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_kembali ?? 'Belum Kembali' }}</td>
                    <td>
                        <a href="{{ route('petugas.peminjaman.edit', $peminjaman) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('petugas.peminjaman.destroy', $peminjaman) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
