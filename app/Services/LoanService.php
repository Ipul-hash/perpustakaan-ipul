<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Fine;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanService
{
    const MAX_ACTIVE_LOANS   = 3;
    const LOAN_DURATION_DAYS = 7;

    const STATUS_PENDING   = 'pending';
    const STATUS_BORROWED  = 'borrowed';
    const STATUS_RETURNED  = 'returned';
    const STATUS_CANCELLED = 'cancelled';

    public function semuaLoans()
    {
        return Loan::with(['book', 'member', 'fine'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function satuLoan($id)
    {
        return Loan::with(['book', 'member', 'fine'])->find($id);
    }

    public function loanAktifMember($memberId)
    {
        return Loan::with(['book', 'fine'])
            ->where('member_id', $memberId)
            ->whereIn('status', [self::STATUS_PENDING, self::STATUS_BORROWED])
            ->get();
    }

    private function validateStock(Book $book): void
    {
        if ($book->stock <= 0) {
            throw new \Exception('Buku lagi kosong, bro. Stok habis.');
        }
    }

    private function validateLoanLimit(int $memberId): void
    {
        $activeCount = Loan::where('member_id', $memberId)
            ->whereIn('status', [self::STATUS_PENDING, self::STATUS_BORROWED])
            ->count();

        if ($activeCount >= self::MAX_ACTIVE_LOANS) {
            throw new \Exception('Member sudah mencapai batas maksimal peminjaman (' . self::MAX_ACTIVE_LOANS . ' buku).');
        }
    }

    private function validateNoDenda(int $memberId): void
    {
        $unpaidFines = Fine::whereHas('loan', function ($q) use ($memberId) {
            $q->where('member_id', $memberId);
        })->where('payment_status', 'unpaid')->exists();

        if ($unpaidFines) {
            throw new \Exception('Member masih punya denda belum lunas. Harus bayar dulu sebelum pinjam buku baru.');
        }
    }

    private function validateNoDoubleBooking(int $memberId, int $bookId): void
    {
        $exists = Loan::where('member_id', $memberId)
            ->where('book_id', $bookId)
            ->whereIn('status', [self::STATUS_PENDING, self::STATUS_BORROWED])
            ->exists();

        if ($exists) {
            throw new \Exception('Member sudah meminjam buku ini dan belum dikembalikan.');
        }
    }

    private function validateAll(int $memberId, Book $book): void
    {
        $this->validateStock($book);
        $this->validateLoanLimit($memberId);
        $this->validateNoDenda($memberId);
        $this->validateNoDoubleBooking($memberId, $book->id);
    }

    public function requestPinjam(array $data): Loan
    {
        $member = Member::findOrFail($data['member_id']);
        $book   = Book::findOrFail($data['book_id']);

        $this->validateAll($member->id, $book);

        $loan = Loan::create([
            'book_id'   => $book->id,
            'member_id' => $member->id,
            'loan_date' => Carbon::now(),
            'due_date'  => Carbon::now()->addDays(self::LOAN_DURATION_DAYS),
            'status'    => self::STATUS_PENDING,
        ]);

        return $loan->load(['book', 'member']);
    }

    public function approvePinjam(int $loanId): Loan
    {
        return DB::transaction(function () use ($loanId) {
            $loan = Loan::with('book')->findOrFail($loanId);

            if ($loan->status !== self::STATUS_PENDING) {
                throw new \Exception('Loan ini statusnya bukan pending, tidak bisa di-approve.');
            }

            $this->validateStock($loan->book);

            $loan->update([
                'status'    => self::STATUS_BORROWED,
                'loan_date' => Carbon::now(),
                'due_date'  => Carbon::now()->addDays(self::LOAN_DURATION_DAYS),
            ]);

            $loan->book->decrement('stock');

            return $loan->refresh()->load(['book', 'member']);
        });
    }

    public function forceBorrow(array $data): Loan
    {
        $member = Member::findOrFail($data['member_id']);
        $book   = Book::findOrFail($data['book_id']);

        $this->validateStock($book);
        $this->validateNoDoubleBooking($member->id, $book->id);

        return DB::transaction(function () use ($book, $member) {
            $loan = Loan::create([
                'book_id'   => $book->id,
                'member_id' => $member->id,
                'loan_date' => Carbon::now(),
                'due_date'  => Carbon::now()->addDays(self::LOAN_DURATION_DAYS),
                'status'    => self::STATUS_BORROWED,
            ]);

            $book->decrement('stock');

            return $loan->load(['book', 'member']);
        });
    }

    public function staffPinjam(array $data): Loan
    {
        $member = Member::findOrFail($data['member_id']);
        $book   = Book::findOrFail($data['book_id']);

        $this->validateAll($member->id, $book);

        return DB::transaction(function () use ($book, $member) {
            $loan = Loan::create([
                'book_id'   => $book->id,
                'member_id' => $member->id,
                'loan_date' => Carbon::now(),
                'due_date'  => Carbon::now()->addDays(self::LOAN_DURATION_DAYS),
                'status'    => self::STATUS_BORROWED,
            ]);

            $book->decrement('stock');

            return $loan->load(['book', 'member']);
        });
    }

    public function batalkanLoan(int $loanId): Loan
    {
        $loan = Loan::findOrFail($loanId);

        if ($loan->status !== self::STATUS_PENDING) {
            throw new \Exception('Hanya loan berstatus pending yang bisa dibatalkan.');
        }

        $loan->update(['status' => self::STATUS_CANCELLED]);

        return $loan->refresh()->load(['book', 'member']);
    }
}
