<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuans')->insert([
          [
            'name' => 'DUS'
          ],
          [
            'name' => 'PAK'
          ],
          [
            'name' => 'PCS'
          ],
          [
            'name' => 'BOX'
          ],
          [
            'name' => 'GRAM'
          ],
          [
            'name' => 'GLS'
          ],
          [
            'name' => 'JASA'
          ]
        ]);
    }
}
