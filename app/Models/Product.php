<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'category_product_id',
        'name',
        'description',
        'stock',
        'image',
        'price',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function detail_transactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
