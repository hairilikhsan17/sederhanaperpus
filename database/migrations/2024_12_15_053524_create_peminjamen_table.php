<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');  // Relasi ke mahasiswa
            $table->unsignedBigInteger('buku_id');  // Relasi ke buku
            $table->enum('status', ['Pinjam', 'Kembali']);  // Status peminjaman
            $table->date('tanggal_pinjam');  // Tanggal peminjaman
            $table->date('tanggal_kembali')->nullable();  // Tanggal pengembalian
            $table->text('keterangan')->nullable();  // Kolom keterangan yang baru ditambahkan
            $table->timestamps();

            // Foreign Keys
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
