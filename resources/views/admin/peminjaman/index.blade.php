@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Data Peminjaman</h1>

    <div class="text-right mb-3">
        <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-success">Tambah Peminjaman</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mahasiswa</th>
                    <th>Buku</th>
                    <th>Status</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Keterangan</th>
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
                    <td>{{ $peminjaman->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
