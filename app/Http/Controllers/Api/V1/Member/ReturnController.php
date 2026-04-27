<?php

namespace App\Http\Controllers\Api\V1\Member;

use App\Http\Controllers\Controller;
use App\Services\ReturnService;

class ReturnController extends Controller
{
    protected $returnService;

    public function __construct(ReturnService $returnService)
    {
        $this->returnService = $returnService;
    }

    public function history(string $memberId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Histori pengembalian member',
            'data'    => $this->returnService->historyMember($memberId),
        ], 200);
    }

    public function denda(string $memberId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data denda member',
            'data'    => $this->returnService->dendaMember($memberId),
        ], 200);
    }
}
