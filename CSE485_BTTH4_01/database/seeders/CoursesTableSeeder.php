<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50;$i++) { 
            DB::table('courses')->insert([
                'name' => $faker->sentence(3), 
                'description' => $faker->paragraph, 
                'difficulty' => $faker->randomElement(['beginner', 'intermediate', 'advanced']), 
                'price' => $faker->randomFloat(2, 50, 300), 
                'start_date' => $faker->date('Y-m-d', '2024-01-01'), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
