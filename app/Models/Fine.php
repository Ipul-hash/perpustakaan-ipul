<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fine extends Model
{
    protected $fillable = ['loan_id', 'amount', 'payment_status'];

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }
}