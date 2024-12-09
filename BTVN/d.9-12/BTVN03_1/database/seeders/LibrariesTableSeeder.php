<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            DB::table('libraries')->insert([
                'name' => $faker->company . ' Library',
                'address' => $faker->address, 
                'contact_number' => $faker->numerify('##########'), 
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }
    }
}
