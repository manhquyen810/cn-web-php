<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company, 
                'location' => $faker->address, 
                'total_seats' => $faker->numberBetween(100, 500), 
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }
    }
}
