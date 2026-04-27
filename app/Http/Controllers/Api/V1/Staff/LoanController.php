<?php

namespace App\Http\Controllers\Api\V1\Staff;

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

    public function approvePinjam(string $id)
    {
        try {
            $loan = $this->loanService->approvePinjam($id);

            return response()->json([
                'success' => true,
                'message' => 'Peminjaman berhasil disetujui. Buku sudah dikeluarkan.',
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
