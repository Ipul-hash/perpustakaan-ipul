<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\BookController;
use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\LoanController as AdminLoanController;
use App\Http\Controllers\Api\V1\Admin\ReturnController as AdminReturnController;
use App\Http\Controllers\Api\V1\Staff\LoanController as StaffLoanController;
use App\Http\Controllers\Api\V1\Member\LoanController as MemberLoanController;
use App\Http\Controllers\Api\V1\Member\ReturnController as MemberReturnController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/semua-buku', [BookController::class, 'index']);
Route::get('/satu-buku/{id}', [BookController::class, 'show']);
Route::post('/tambah-buku', [BookController::class, 'store']);
Route::put('/update-buku/{id}', [BookController::class, 'update']);
Route::delete('/hapus-buku/{id}', [BookController::class, 'destroy']);

Route::get('/semua-categories', [CategoryController::class, 'index']);
Route::get('/satu-category/{id}', [CategoryController::class, 'show']);
Route::post('/tambah-category', [CategoryController::class, 'store']);
Route::put('/update-category/{id}', [CategoryController::class, 'update']);
Route::delete('/hapus-category/{id}', [CategoryController::class, 'destroy']);

Route::get('/semua-members', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Member::all(),
    ]);
});

Route::prefix('admin')->group(function () {
    Route::get('/semua-loans', [AdminLoanController::class, 'index']);
    Route::get('/satu-loan/{id}', [AdminLoanController::class, 'show']);
    Route::post('/force-pinjam', [AdminLoanController::class, 'forceBorrow']);
    Route::put('/batalkan-loan/{id}', [AdminLoanController::class, 'batalkanLoan']);

    Route::get('/semua-returns', [AdminReturnController::class, 'index']);
    Route::get('/loans-dipinjam', [AdminReturnController::class, 'loansDipinjam']);
    Route::put('/proses-pengembalian/{id}', [AdminReturnController::class, 'prosesPengembalian']);
    Route::put('/bayar-denda/{id}', [AdminReturnController::class, 'bayarDenda']);
});

Route::prefix('staff')->group(function () {
    Route::get('/semua-loans', [StaffLoanController::class, 'index']);
    Route::put('/approve-pinjam/{id}', [StaffLoanController::class, 'approvePinjam']);
});

Route::prefix('member')->group(function () {
    Route::get('/my-loans/{memberId}', [MemberLoanController::class, 'myLoans']);
    Route::post('/request-pinjam', [MemberLoanController::class, 'requestPinjam']);
    Route::put('/batalkan-loan/{id}', [MemberLoanController::class, 'batalkanLoan']);

    Route::get('/history/{memberId}', [MemberReturnController::class, 'history']);
    Route::get('/denda/{memberId}', [MemberReturnController::class, 'denda']);
});