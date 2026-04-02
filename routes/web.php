<?php

use Illuminate\Support\Facades\Route;

/* ===============================
   USER
=================================*/

// Halaman Dashboard User
Route::get('/', function () {
    return view('user.dashboard');
});

// Halaman Akademik User
Route::prefix('akademik')->name('akademik.')->group(function () {
    Route::view('/', 'user.akademik.index')->name('index');
    Route::view('/struktur', 'user.akademik.akademik-struktural')->name('struktur');
    Route::view('/walas', 'user.akademik.walas')->name('walas');
    Route::view('/guru', 'user.akademik.guru')->name('guru');
});

// Halaman Berita User
Route::get('/berita', [\App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/detail/{id}', [\App\Http\Controllers\BeritaController::class, 'show'])->name('berita.detail');

// Halaman PPDB User
Route::prefix('ppdb')->name('ppdb.')->group(function () {

    // Landing PPDB (Hero Page)
    Route::get('/', function () {
        return view('user.ppdb.index');
    })->name('index');

    // Menu Register / Login
    Route::get('/menu', function () {
        return view('user.ppdb.menu');
    })->name('menu');

    // Register
    Route::get('/register', function () {
        return view('user.ppdb.register');
    })->name('register');

    // Login
    Route::get('/login', function () {
        return view('user.ppdb.login');
    })->name('login');

    // Reset Password
    Route::get('/reset-password', function () {
        return view('user.ppdb.reset');
    })->name('reset');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('user.ppdb.dashboard');
    })->name('dashboard');

    // Pilih Lokasi Ujian
    Route::get('/pilih-lokasi', function () {
        return view('user.ppdb.pilih-lokasi');
    })->name('pilih-lokasi');

    // Form Pendaftaran
    Route::get('/pendaftaran/data', function () {
        return view('user.ppdb.pendaftarandata');
    })->name('pendaftaran.data');

    Route::get('/pendaftaran/diri', function () {
        return view('user.ppdb.pendaftarandiri');
    })->name('pendaftaran.diri');

    Route::get('/pendaftaran/form', function () {
        return view('user.ppdb.pendaftaranform');
    })->name('pendaftaran.form');

    // Administratif
    Route::get('/administratif', function () {
        return view('user.ppdb.administratif');
    })->name('administratif');

    // Jadwal Ujian
    Route::get('/ujian', function () {
        return view('user.ppdb.ujian');
    })->name('ujian');

    // Informasi Kelulusan
    Route::get('/kelulusan', function () {
        return view('user.ppdb.kelulusan');
    })->name('kelulusan');

});

// Halaman Sarpas User
Route::get('/sarpas', function () {
    return view('user.sarpas');
});

// Halaman RDM User
Route::get('/rdm', function () {
    return view('user.rdm');
});

/* ===============================
   ADMIN
=================================*/

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Login Admin
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');

    Route::get('/reset-password', function () {
        return view('admin.reset');
    })->name('reset');

    // Dashboard Utama Admin
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

    // Kelola Berita
    Route::get('/berita', function () {
        return view('admin.berita');
    })->name('berita');

    // Kelola Struktural Sekolah
    Route::get('/struktural', function () {
        return view('admin.struktural');
    })->name('struktural');

    // Kelola PPDB
    Route::get('/ppdb', [\App\Http\Controllers\Admin\AdminPpdbController::class, 'index'])->name('ppdb');

    Route::get('/ppdb/detail/{id}', [\App\Http\Controllers\Admin\AdminPpdbController::class, 'show'])->name('ppdb.detail');

    Route::get('/ppdb/detail-next/{id}', [\App\Http\Controllers\Admin\AdminPpdbController::class, 'showNext'])->name('ppdb.detail.next');

    // API-like route to update status (called from frontend script)
    Route::put('/ppdb/pendaftar/{id}/status', [\App\Http\Controllers\Admin\AdminPpdbController::class, 'updateStatus'])->name('ppdb.status.update');

    // Kelola Daftar Siswa
    Route::get('/daftar-siswa', [\App\Http\Controllers\Admin\AdminPpdbController::class, 'daftarSiswa'])->name('admin.datasiswa');

});