<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_paid',
        'payment_receipt'
    ];

    public function detail_transactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
