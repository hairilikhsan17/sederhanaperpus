<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen'; // Nama tabel di database
    protected $fillable = [
        'mahasiswa_id', 
        'buku_id', 
        'status', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'keterangan' // Menambahkan kolom keterangan
    ];

    /**
     * Relasi ke tabel Mahasiswa.
     * Satu peminjaman dimiliki oleh satu mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    /**
     * Relasi ke tabel Buku.
     * Satu peminjaman melibatkan satu buku.
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
