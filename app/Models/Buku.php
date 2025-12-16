<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'pengarang', 'tahun_terbit', 'stok'];

    // Relasi ke Peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
