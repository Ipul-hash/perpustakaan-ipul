<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/manajemen-buku', [PageController::class, 'manajemenBuku'])->name('manajemenBuku');
Route::get('/manajemen-kategori', [PageController::class, 'manajemenKategori'])->name('manajemenKategori');
Route::get('/manajemen-peminjaman', [PageController::class, 'manajemenPeminjam'])->name('manajemenPeminjam');
Route::get('/manajemen-pengembalian', [PageController::class, 'manajemenPengembalian'])->name('manajemenPengembalian');
Route::get('/manajemen-anggota', [PageController::class, 'manajemenAnggota'])->name('manajemenAnggota');
Route::get('/manajemen-member', [PageController::class, 'manajemenMember'])->name('manajemenMember');