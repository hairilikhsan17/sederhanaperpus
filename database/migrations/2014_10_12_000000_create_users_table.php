<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel users.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID unik untuk pengguna
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik untuk pengguna
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email (opsional)
            $table->string('password'); // Password pengguna yang telah di-hash
            $table->enum('role', ['admin', 'petugas'])->default('petugas'); // Role pengguna, default ke "petugas"
            $table->rememberToken(); // Token untuk "remember me" saat login
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    /**
     * Hapus tabel users jika diperlukan.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
