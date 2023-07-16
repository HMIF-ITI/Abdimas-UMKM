<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'user_id',
        'product_id',
        'transaction_id',
        'status',
        'qty'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
