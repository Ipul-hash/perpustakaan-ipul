<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\Admin\BookController;
use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\LoanController as AdminLoanController;
use App\Http\Controllers\Api\V1\Admin\ReturnController as AdminReturnController;
use App\Http\Controllers\Api\V1\Staff\LoanController as StaffLoanController;
use App\Http\Controllers\Api\V1\Member\LoanController as MemberLoanController;
use App\Http\Controllers\Api\V1\Member\ReturnController as MemberReturnController;
use App\Http\Controllers\Api\V1\Admin\CreateMemberController as CreateMemberController;
use App\Http\Controllers\Api\V1\Staff\CreateMemberController as CreateMemberStaffController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()->load('roles', 'permissions'),
            'member' => \App\Models\Member::where('user_id', $request->user()->id)->first()
        ]);
    });

    Route::get('/dashboard-stats', function () {
        $totalBooks = \App\Models\Book::count();
        $totalMembers = \App\Models\Member::count();
        $activeLoans = \App\Models\Loan::where('status', 'borrowed')->count();
        $pendingLoans = \App\Models\Loan::where('status', 'pending')->count();
        $overdueLoans = \App\Models\Loan::where('status', 'borrowed')->where('due_date', '<', now())->count();
        
        $recentLoans = \App\Models\Loan::with(['book', 'member'])->orderBy('updated_at', 'desc')->limit(5)->get();
        $popularBooks = \App\Models\Book::withCount('loans')->orderBy('loans_count', 'desc')->limit(5)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total_books' => $totalBooks,
                'total_members' => $totalMembers,
                'active_loans' => $activeLoans,
                'pending_loans' => $pendingLoans,
                'overdue_loans' => $overdueLoans,
                'recent_loans' => $recentLoans,
                'popular_books' => $popularBooks
            ]
        ]);
    });

    Route::get('/semua-buku', [BookController::class, 'index']);
    Route::get('/satu-buku/{id}', [BookController::class, 'show']);
    Route::get('/semua-categories', [CategoryController::class, 'index']);
    Route::get('/satu-category/{id}', [CategoryController::class, 'show']);

    Route::middleware('permission:manage.books')->group(function () {
        Route::post('/tambah-buku', [BookController::class, 'store']);
        Route::put('/update-buku/{id}', [BookController::class, 'update']);
        Route::delete('/hapus-buku/{id}', [BookController::class, 'destroy']);
    });

    Route::middleware('permission:manage.categories')->group(function () {
        Route::post('/tambah-category', [CategoryController::class, 'store']);
        Route::put('/update-category/{id}', [CategoryController::class, 'update']);
        Route::delete('/hapus-category/{id}', [CategoryController::class, 'destroy']);
    });

    Route::middleware('permission:manage.members')->group(function () {
        Route::get('/semua-members', function () {
            return response()->json([
                'success' => true,
                'data' => \App\Models\Member::all(),
            ]);
        });
        Route::post('/tambah-member', [CreateMemberController::class, 'store']);
    });

    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/semua-loans', [AdminLoanController::class, 'index']);
        Route::get('/satu-loan/{id}', [AdminLoanController::class, 'show']);
        Route::post('/force-pinjam', [AdminLoanController::class, 'forceBorrow']);
        Route::put('/batalkan-loan/{id}', [AdminLoanController::class, 'batalkanLoan']);

        Route::get('/semua-returns', [AdminReturnController::class, 'index']);
        Route::get('/loans-dipinjam', [AdminReturnController::class, 'loansDipinjam']);
        Route::put('/proses-pengembalian/{id}', [AdminReturnController::class, 'prosesPengembalian']);
        Route::put('/bayar-denda/{id}', [AdminReturnController::class, 'bayarDenda']);

        Route::get('/semua-petugas', [\App\Http\Controllers\Api\V1\Admin\CreateUserController::class, 'index']);
        Route::post('/tambah-petugas', [\App\Http\Controllers\Api\V1\Admin\CreateUserController::class, 'store']);
        Route::get('/satu-petugas/{id}', [\App\Http\Controllers\Api\V1\Admin\CreateUserController::class, 'show']);
        Route::put('/update-petugas/{id}', [\App\Http\Controllers\Api\V1\Admin\CreateUserController::class, 'update']);
        Route::delete('/hapus-petugas/{id}', [\App\Http\Controllers\Api\V1\Admin\CreateUserController::class, 'destroy']);
    });

    Route::prefix('staff')->middleware('permission:process.loans')->group(function () {
        Route::get('/semua-loans', [StaffLoanController::class, 'index']);
        Route::put('/approve-pinjam/{id}', [StaffLoanController::class, 'approvePinjam']);
        Route::post('/pinjam-buku', [StaffLoanController::class, 'pinjamBuku']);

        Route::get('/semua-returns', [AdminReturnController::class, 'index']);
        Route::get('/loans-dipinjam', [AdminReturnController::class, 'loansDipinjam']);
        Route::put('/proses-pengembalian/{id}', [AdminReturnController::class, 'prosesPengembalian']);
        Route::put('/bayar-denda/{id}', [AdminReturnController::class, 'bayarDenda']);
    });

    Route::prefix('member')->middleware('role:member')->group(function () {
        Route::get('/my-loans/{memberId}', [MemberLoanController::class, 'myLoans']);
        Route::post('/request-pinjam', [MemberLoanController::class, 'requestPinjam']);
        Route::put('/batalkan-loan/{id}', [MemberLoanController::class, 'batalkanLoan']);

        Route::get('/history/{memberId}', [MemberReturnController::class, 'history']);
        Route::get('/denda/{memberId}', [MemberReturnController::class, 'denda']);
    });
});