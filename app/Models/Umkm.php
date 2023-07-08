<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelaku_umkm',
        'name',
        'image',
        'description',
        'address',
        'link_address'
    ];

    public function pelaku_umkm()
    {
        return $this->belongsTo(PelakuUmkm::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
