<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LoanService;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index()
    {
        $loans = $this->loanService->semuaLoans();

        return response()->json([
            'success' => true,
            'message' => 'Semua data peminjaman berhasil didapatkan',
            'data'    => $loans,
        ], 200);
    }

    public function show(string $id)
    {
        $loan = $this->loanService->satuLoan($id);

        if (!$loan) {
            return response()->json([
                'success' => false,
                'message' => 'Data peminjaman tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail peminjaman berhasil didapatkan',
            'data'    => $loan,
        ], 200);
    }

    public function forceBorrow(Request $request)
    {
        try {
            $loan = $this->loanService->forceBorrow($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Force borrow berhasil. Buku langsung dipinjamkan.',
                'data'    => $loan,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function batalkanLoan(string $id)
    {
        try {
            $loan = $this->loanService->batalkanLoan($id);

            return response()->json([
                'success' => true,
                'message' => 'Request peminjaman berhasil dibatalkan.',
                'data'    => $loan,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
