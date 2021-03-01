<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = \Hash::make('12345678');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => $password,
            'email_verified_at' => date_default_timezone_get(),
        ]);

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'email_verified_at' => date_default_timezone_get(),
            ]);
        }
    }
}
