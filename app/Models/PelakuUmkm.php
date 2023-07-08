<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class PelakuUmkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'nik',
        'address',
        'password'
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }
}
