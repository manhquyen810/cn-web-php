<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 10; $i++){
            DB::table('computers')->insert([
                'computer_name' => $faker->word() . ' ' . $faker->randomElement(['Pro', 'Air', 'Max', 'Mini']),
                'model' => 'Model ' . strtoupper($faker->bothify('??###')),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'macOS Ventura', 'Linux Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'Apple M2', 'AMD Ryzen 7']),
                'memory' => $faker->randomElement([4, 8, 16, 32]), 
                'available' => $faker->boolean(70), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
