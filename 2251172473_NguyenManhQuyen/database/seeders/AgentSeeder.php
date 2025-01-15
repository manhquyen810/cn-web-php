<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('agents')->insert([
                'name'=>$faker->company,
                'email'=>$faker->unique()->companyEmail,
                'phone'=>$faker->phoneNumber,
                'office'=>$faker->jobTitle,
                'created_at' => now(),                     
                'updated_at' => now(), 
            ]);
        }
    }
}
