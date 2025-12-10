<?php

use Illuminate\Support\Facades\Route;

// ================================
// HALAMAN UTAMA & INFO
// ================================
Route::get('/', function () {
    return view('ftik');
});

Route::get('/info', function () {
    return view('info', ['progdi' => 'TI']);
});

use App\Http\Controllers\InfoController;
Route::get('/info/{kd}', [InfoController::class, 'infoMhs']);


// ================================
// MODUL BUKU
// ================================
use App\Http\Controllers\BukuController;

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/add', [BukuController::class, 'add_new']);
Route::post('/buku/save', [BukuController::class, 'save']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);


// ================================
// MODUL ANGGOTA
// ================================
use App\Http\Controllers\AnggotaController;

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/add', [AnggotaController::class, 'add_new']);
Route::post('/anggota/save', [AnggotaController::class, 'save']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::put('/anggota/update/{id}', [AnggotaController::class, 'update']);
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);


// ================================
// MODUL PINJAM
// ================================
use App\Http\Controllers\PinjamController;

Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/pinjam/add', [PinjamController::class, 'add_new']);
Route::post('/pinjam/save', [PinjamController::class, 'save']);
Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit']);
Route::put('/pinjam/update/{id}', [PinjamController::class, 'update']);
Route::get('/pinjam/delete/{id}', [PinjamController::class, 'delete']);


// ================================
// LOGIN, LOGOUT (AuthController)
// ================================
use App\Http\Controllers\AuthController;

// Guest = hanya untuk user yang BELUM login
Route::middleware('guest')->group(function () {

    // Halaman login
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    // Proses login
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

// Auth = hanya untuk user yang SUDAH login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Halaman perpus setelah login
    Route::get('/perpus', function () {
        return view('perpus.main');
    })->name('perpus');
});
