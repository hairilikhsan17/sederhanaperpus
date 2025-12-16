<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'jurusan'];

    // Relasi ke Peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
