<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 4; $i++){ 
            DB::table('users')->insert([  
                'name'                      => $faker->name, 
                'email'                     => $faker->freeEmail, 
                'password'                  => bcrypt('secret'), 
                'role'                      => 'unit', 
                'pic_name'                  => 'Unit 1', 
                'picto'                     => 1,
                'created_at'                => $faker->dateTimeBetween('+1 week', '+1 month'),
                'updated_at'                => $faker->dateTimeBetween('+1 week', '+1 month'),

            ]);
        }
    }
}
