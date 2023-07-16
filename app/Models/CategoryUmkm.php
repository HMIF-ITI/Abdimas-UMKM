<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUmkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }
}
