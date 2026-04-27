<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberPageController;

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
Route::get('/pinjam-buku', [PageController::class, 'pinjamBuku'])->name('pinjamBuku');

// Route khusus Member
Route::prefix('member')->group(function () {
    Route::get('/dashboard', [MemberPageController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/pinjam-buku', [MemberPageController::class, 'pinjamBuku'])->name('member.pinjamBuku');
    Route::get('/riwayat', [MemberPageController::class, 'riwayat'])->name('member.riwayat');
});
