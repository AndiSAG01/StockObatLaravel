<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'TABLET'
            ],
            [
                'name' => 'CAIR'
            ],
            [
                'name' => 'KAPSUL'
            ],
            [
                'name' => 'SIRUP'
            ],
            [
                'name' => 'SUSPENSI'
            ],
            [
                'name' => 'INJEKSI'
            ],
            [
                'name' => 'KRIM ATAU SALEP'
            ],
            [
                'name' => 'GEL'
            ],
            [
                'name' => 'PATCH TRANSDERMAL'
            ],
            [
                'name' => 'SUPOSITORIA'
            ],
            [
                'name' => 'SERBUK'
            ],
            [
                'name' => 'KAPSUL CAIR'
            ],
            [
                'name' => 'TABLET SUBLINGUAL'
            ],
            [
                'name' => 'AEROSOL'
            ],
        ]);        
        
    }
}
