<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 100; $i++){ 
            DB::table('laporans')->insert([  
                'situasi_umum'              => $faker->text($maxNbChars = 191),
                'laporan_polisi'            => $faker->numberBetween($min = 1, $max = 100),
                'perkara_sidik'             => $faker->numberBetween($min = 1, $max = 100),
                'perkara_lidik'             => $faker->numberBetween($min = 1, $max = 100),
                'perkara_selra'             => $faker->numberBetween($min = 1, $max = 100),
                'perkara_sp3'               => $faker->numberBetween($min = 1, $max = 100),
                'perkara_henti_lidik'       => $faker->numberBetween($min = 1, $max = 100),
                'perkara_p21'               => $faker->numberBetween($min = 1, $max = 100),
                'upp_pemanggilan'           => $faker->numberBetween($min = 1, $max = 100),
                'upp_penangkapan'           => $faker->numberBetween($min = 1, $max = 100),
                'upp_penahanan'             => $faker->numberBetween($min = 1, $max = 100),
                'upp_penggeledahan'         => $faker->numberBetween($min = 1, $max = 100),
                'upp_penyitaan'             => $faker->numberBetween($min = 1, $max = 100),
                'kejahatan_menonjol_desc'   => $faker->text($maxNbChars = 191),
                'jlh_tahanan'               => $faker->numberBetween($min = 1, $max = 50),
                'tanggal_situasi'           => $faker->dateTimeBetween('+1 week', '+1 month'),
                'from_userid'               => $faker->numberBetween($min = 3, $max = 7),
                'to_userid'                 => 1,
                // 'to_userid'                 => $faker->numberBetween($min = 1, $max = 2),
                'created_at'                => $faker->dateTimeBetween('+1 week', '+1 month'),
                'updated_at'                => $faker->dateTimeBetween('+1 week', '+1 month'),

            ]);

        }
    }
}
