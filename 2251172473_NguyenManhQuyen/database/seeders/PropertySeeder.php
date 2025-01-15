<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();

        $agentIds = DB::table('agents')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('properties')->insert([
                'agent_id' => $faker->randomElement($agentIds), 
                'address' => $faker->address,              
                'city' => $faker->city,
                'type' => $faker->randomElement(['apartment','house','land']), 
                'price' => $faker->randomFloat(2, 1, 1000), 
                'status' => $faker->randomElement(['for_sale','house','land']), 
                'created_at' => now(),                         
                'updated_at' => now(),
            ]);
        }
    }
}
