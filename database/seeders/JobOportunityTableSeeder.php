<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobOportunity;

class JobOportunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobOportunity::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {
            JobOportunity::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => ['active', 'inactive'][rand(0, 1)],
                'workplace' => $faker->address,
                'salary' => mt_rand(1000, 10000)
            ]);
        }
    }
}
