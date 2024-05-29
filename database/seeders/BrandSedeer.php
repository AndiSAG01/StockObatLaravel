<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'INDO'
            ],
            [
                'name' => 'NESTLE'
            ],
            [
                'name' => 'INDOFOOD'
            ],
            [
                'name' => 'OMRON'
            ]
        ]);
    }
}
