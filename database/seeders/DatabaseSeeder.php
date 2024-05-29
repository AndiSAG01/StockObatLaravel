<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'name' => 'Pemilik',
                'email' => 'Owner2024',
                'password' => Hash::make('12345678'),
                'isAdmin' => true
            ],
            [
                'name' => 'Pegawai',
                'email' => 'Pegawai2024',
                'password' => Hash::make('12345678'),
                'isAdmin' => false
            ]
        ]);
        $this->call([
            TypeSedeer::class,
            SatuanSedeer::class,
            BrandSedeer::class,
            SupplierSeeder::class, //
        ]);
    }

}
