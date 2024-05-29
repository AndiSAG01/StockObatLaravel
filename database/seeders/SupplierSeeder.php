<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT MENSA BINASUKSES',
                'address' => 'JL. Orang Kayo Pingai, No. 40-A, RT 008, 36142, Payo Selincah, Kec. Jambi Tim., Kota Jambi, Jambi 36254',
                'telphone' => '0741 7554079',
            ],
            [
                'name' => 'PT MERAPI UTAMA PHARMA',
                'address' => 'Jambi Trade Center No. 1, Jl. Lingkar Selatan No.RT. 26, Kenali Asam Bawah, Kec. Kota Baru, Kota Jambi, Jambi 36129',
                'telphone' => '0741 443735',
            ],
            [
                'name' => 'PT NARECO LESTARI',
                'address' => 'Jl. H. Kamil, Wijaya Pura, Kec. Jambi Sel., Kota Jambi, Jambi 36122',
                'telphone' => '62 852-0845-3608',
            ],
            [
                'name' => 'PT NEW ASIAPHARM',
                'address' => 'Jl. Makalam, Cemp. Putih, Kec. Jelutung, Kota Jambi, Jambi 36123',
                'telphone' => '62 741 24004',
            ],
            [
                'name' => 'PT PARIT PADANG GLOBAL',
                'address' => 'Jl.Kopral Udara Syaring No.141 RT 10 Kec, Paal Merah, Kec. Jambi Sel., Kota Jambi, 36135',
                'telphone' => '	021 46834411',
            ],
            [
                'name' => 'PT PENTA VALENT',
                'address' => 'Jl. KH. Hasyim Ashari, Rajawali, Kec. Jambi Tim., Kota Jambi, Jambi 36123',
                'telphone' => '62 21 5673891',
            ],
            [
                'name' => 'PT PHAROS',
                'address' => 'Lorong Merpati V, Eka Jaya, Kec. Jambi Sel., Kota Jambi, Jambi 36144',
                'telphone' => '0741 667815',
            ],
            [
                'name' => 'PT PUTRA MEGA MEDIKA',
                'address' => 'Jl. Orang Kayo Hitam No.25, Sulanjana, Kec. Jambi Tim., Kota Jambi, Jambi 36144',
                'telphone' => ' 082281151843',
            ],
            [
                'name' => 'PT SAMUDRA JAYA ANUGERAH',
                'address' => 'JALAN RAYA KASANG PUDAK N0 34 RT 24, Kasang Pudak, Kec. Kumpeh Ulu, Kabupaten Muaro Jambi, Jambi 36383',
                'telphone' => '0812 6689 8989',
            ],
            [
                'name' => 'PT SAPTA SARI TAMA',
                'address' => 'Kenali Asam Bawah, Kec. Kota Baru, Kota Jambi, Jambi 36128',
                'telphone' => '0741 41453',
            ],
            [
                'name' => 'PT SIGRA DUTA MEDIKAL',
                'address' => 'Jl. Purnama, Suka Karya, Kec. Kota Baru, Kota Jambi, Jambi 36129',
                'telphone' => '0741 41384',
            ],
            [
                'name' => 'PT SINDE',
                'address' => '-',
                'telphone' => '-',
            ],
            [
                'name' => 'PT TEMPO SCAN JAMBI',
                'address' => 'Jl. Hayam Wuruk, Jelutung, Kec. Jelutung, Kota Jambi, Jambi 36124',
                'telphone' => '0741 25484',
            ],
            [
                'name' => 'PT ZENA NIRMALA SENTOSA',
                'address' => '-',
                'telphone' => '-',
            ],
            [
                'name' => 'PT ZOKKAS SEJAHTERA',
                'address' => 'Jl. Jend. A. Thalib No.2 Blok E, Simpang IV Sipin, Kec. Telanaipura, Kota Jambi, Jambi 36361',
                'telphone' => '0741 668263',
            ],
            [
                'name' => 'PT. SURYA SHARONE',
                'address' => '-',
                'telphone' => '-',
            ],
            [
                'name' => 'UD CIPTA ANGSO DUO',
                'address' => 'Lrg. Marene No.104, Eka Jaya, Kec. Jambi Sel., Kota Jambi, Jambi 36134',
                'telphone' => '0741 570310',
            ],
        ]);
        
    }
}
