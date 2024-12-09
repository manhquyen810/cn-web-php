<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
    
        $itCenterIds = DB::table('it_centers')->pluck('id');


        for ($i = 0; $i < 100; $i++) { 
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->randomElement(['Logitech G502', 'Corsair K95', 'HyperX Cloud II']), 
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']), 
                'status' => $faker->boolean, 
                'center_id' => $faker->randomElement($itCenterIds), 
                'updated_at' => now(), 
            ]);
        }
    }
}
