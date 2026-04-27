<?php

namespace App\Http\Controllers\Api\V1\Member;

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

    public function myLoans(string $memberId)
    {
        $loans = $this->loanService->loanAktifMember($memberId);

        return response()->json([
            'success' => true,
            'message' => 'Loan aktif member berhasil didapatkan',
            'data'    => $loans,
        ], 200);
    }

    public function requestPinjam(Request $request)
    {
        try {
            $loan = $this->loanService->requestPinjam($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Request peminjaman berhasil dibuat. Silakan ambil buku di perpustakaan.',
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
