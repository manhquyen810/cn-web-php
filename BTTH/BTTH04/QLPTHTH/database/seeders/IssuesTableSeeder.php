<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
    public function run(): void
    {
        $faker = Faker::create();
        
        // Giả sử bạn đã có 10 máy tính trong bảng 'computers'
        $computerIds = DB::table('computers')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->optional()->sentence(10),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
