<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Petugas\DashboardController; // Controller petugas
use App\Http\Controllers\Petugas\MahasiswaController as PetugasMahasiswaController; // Controller petugas mahasiswa
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;

// Redirect ke login
Route::get('/', function () {
    return redirect()->route('auth.login');
})->name('home');

// Rute untuk autentikasi
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute untuk admin
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Rute resource untuk admin
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('mahasiswa', AdminMahasiswaController::class)->except(['show']);
        Route::resource('buku', BukuController::class)->except(['show']);
        // Rute peminjaman dengan filter khusus
        Route::get('peminjaman/filter', [PeminjamanController::class, 'filter'])->name('peminjaman.filter');
        Route::resource('peminjaman', PeminjamanController::class)->except(['show']);
    });

    // Rute untuk petugas
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Rute mahasiswa CRUD
        Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
            Route::get('/', [PetugasMahasiswaController::class, 'index'])->name('index'); // Tampilkan data
            Route::get('/create', [PetugasMahasiswaController::class, 'create'])->name('create'); // Form tambah
            Route::post('/', [PetugasMahasiswaController::class, 'store'])->name('store'); // Simpan data
            Route::get('/{mahasiswa}/edit', [PetugasMahasiswaController::class, 'edit'])->name('edit'); // Form edit
            Route::put('/{mahasiswa}', [PetugasMahasiswaController::class, 'update'])->name('update'); // Update data
            Route::delete('/{mahasiswa}', [PetugasMahasiswaController::class, 'destroy'])->name('destroy'); // Hapus data
        });

        Route::prefix('peminjaman')->name('peminjaman.')->group(function () {
            Route::get('/', [PetugasPeminjamanController::class, 'index'])->name('index');
            Route::get('/create', [PetugasPeminjamanController::class, 'create'])->name('create');
            Route::post('/', [PetugasPeminjamanController::class, 'store'])->name('store');
            Route::get('/{peminjaman}/edit', [PetugasPeminjamanController::class, 'edit'])->name('edit');
            Route::put('/{peminjaman}', [PetugasPeminjamanController::class, 'update'])->name('update');
            Route::delete('/{peminjaman}', [PetugasPeminjamanController::class, 'destroy'])->name('destroy');
            Route::get('/filter', [PetugasPeminjamanController::class, 'filter'])->name('filter');
        });
        

        
        Route::get('mhs', [PetugasMahasiswaController::class, 'index'])->name('mhs');
    });
});
