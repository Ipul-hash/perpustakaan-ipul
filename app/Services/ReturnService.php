<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\Fine;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReturnService
{
    const DENDA_PER_HARI = 1000;

    public function semuaReturns()
    {
        return Loan::with(['book', 'member', 'fine'])
            ->where('status', 'returned')
            ->orderBy('return_date', 'desc')
            ->get();
    }

    public function loansDipinjam()
    {
        return Loan::with(['book', 'member'])
            ->where('status', 'borrowed')
            ->orderBy('due_date', 'asc')
            ->get();
    }

    public function historyMember($memberId)
    {
        return Loan::with(['book', 'fine'])
            ->where('member_id', $memberId)
            ->where('status', 'returned')
            ->orderBy('return_date', 'desc')
            ->get();
    }

    public function dendaMember($memberId)
    {
        return Fine::with(['loan.book'])
            ->whereHas('loan', function ($q) use ($memberId) {
                $q->where('member_id', $memberId);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function prosesPengembalian(int $loanId): Loan
    {
        return DB::transaction(function () use ($loanId) {
            $loan = Loan::with(['book', 'member'])->findOrFail($loanId);

            if ($loan->status !== 'borrowed') {
                throw new \Exception('Buku ini belum dalam status dipinjam.');
            }

            $now = Carbon::now();

            $loan->update([
                'return_date' => $now,
                'status'      => 'returned',
            ]);

            $loan->book->increment('stock');

            if ($now->greaterThan($loan->due_date)) {
                $daysLate = $loan->due_date->diffInDays($now);

                Fine::create([
                    'loan_id'        => $loan->id,
                    'amount'         => $daysLate * self::DENDA_PER_HARI,
                    'payment_status' => 'unpaid','paid',
                ]);
            }

            return $loan->refresh()->load(['book', 'member', 'fine']);
        });
    }

    public function bayarDenda(int $fineId): Fine
    {
        $fine = Fine::findOrFail($fineId);

        if ($fine->payment_status === 'paid') {
            throw new \Exception('Denda ini sudah lunas.');
        }

        $fine->update(['payment_status' => 'paid']);

        return $fine->refresh()->load(['loan.book']);
    }
}
