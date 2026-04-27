<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReturnService;

class ReturnController extends Controller
{
    protected $returnService;

    public function __construct(ReturnService $returnService)
    {
        $this->returnService = $returnService;
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Semua data pengembalian berhasil didapatkan',
            'data'    => $this->returnService->semuaReturns(),
        ], 200);
    }

    public function loansDipinjam()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data buku yang sedang dipinjam',
            'data'    => $this->returnService->loansDipinjam(),
        ], 200);
    }

    public function prosesPengembalian(string $loanId)
    {
        try {
            $loan = $this->returnService->prosesPengembalian($loanId);

            $msg = 'Buku berhasil dikembalikan.';
            if ($loan->fine) {
                $msg .= ' Denda keterlambatan: Rp ' . number_format($loan->fine->amount, 0, ',', '.');
            }

            return response()->json([
                'success' => true,
                'message' => $msg,
                'data'    => $loan,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function bayarDenda(string $fineId)
    {
        try {
            $fine = $this->returnService->bayarDenda($fineId);

            return response()->json([
                'success' => true,
                'message' => 'Denda berhasil dilunaskan.',
                'data'    => $fine,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
