<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'phone_number' => '083891428869',
                'nik' => '1122334455',
                'address' => 'Kp. Kemuning RT 01 RW 04, Kemuning Legok, Kabupaten Tangerang, Banten',
                'password' => Hash::make('password'),
            ]
        ]);

        DB::table('pelaku_umkms')->insert([
            [
                'name' => 'UMKM1',
                'email' => 'umkm1@gmail.com',
                'phone_number' => '083891428869',
                'nik' => '1122334455',
                'address' => 'Kp. Kemuning RT 01 RW 04, Kemuning Legok, Kabupaten Tangerang, Banten',
                'password' => Hash::make('password'),
            ],
        ]);

        DB::table('category_umkms')->insert([
            [
                'name' => 'Makanan',
            ],
            [
                'name' => 'Fashion',
            ],
            [
                'name' => 'Elektronik',
            ],
            [
                'name' => 'Jasa',
            ],
            [
                'name' => 'Lainnya',
            ],
        ]);

        DB::table('category_products')->insert([
            [
                'name' => 'Makanan',
            ],
            [
                'name' => 'Fashion',
            ],
            [
                'name' => 'Elektronik',
            ],
            [
                'name' => 'Jasa',
            ],
            [
                'name' => 'Lainnya',
            ],
        ]);
    }
}
