<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelaku_umkm_id',
        'category_umkm_id',
        'name',
        'image',
        'description',
        'address',
        'bank',
        'norek',
        'atas_nama',
        'link_address'
    ];

    public function pelaku_umkm()
    {
        return $this->belongsTo(PelakuUmkm::class);
    }

    public function category_umkm()
    {
        return $this->belongsTo(CategoryUmkm::class);
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
