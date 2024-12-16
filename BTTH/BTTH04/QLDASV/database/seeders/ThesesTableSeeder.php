<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ThesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $studentIds = DB::table('students')->pluck('id');

        for($i = 0;$i <10;$i++){
                DB::table('theses')->insert([
                'title' => $faker->sentence(6),
                'student_id' => $faker->randomElement($studentIds),
                'program' => $faker->randomElement(['Information Systems', 'Software Engineering', 'Data Science']),
                'supervisor' => $faker->name,
                'abstract' => $faker->paragraph(5),
                'submission_date' => $faker->date(),
                'defense_date' => $faker->date(),
                ]);
        }
    }
}
