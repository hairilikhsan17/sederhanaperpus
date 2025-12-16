@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Data Peminjaman</h1>

    <!-- Action Buttons -->
    <div class="text-right mb-3">
        <a href="{{ route('petugas.peminjaman.create') }}" class="btn btn-success">Tambah Peminjaman</a>
        <a href="{{ route('petugas.peminjaman.filter') }}" class="btn btn-info">Filter</a>
    </div>

    <!-- Tabel Peminjaman -->
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
