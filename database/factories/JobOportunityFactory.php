<?php

namespace Database\Factories;

use App\Models\JobOportunity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobOportunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobOportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => 'active',
            'workplace' => $this->faker->address,
            'salary' => mt_rand(1000, 10000)
        ];
    }
}
