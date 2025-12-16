<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Kolom tambahan untuk role (admin/petugas)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Helper untuk mengecek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Helper untuk mengecek apakah user adalah petugas
    public function isPetugas()
    {
        return $this->role === 'petugas';
    }
}
