<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->catchPhrase(),
            'description' => fake()->paragraph(),
            'start_date' => fake()->date(),
            'end_date' => fake()->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
            'status' => fake()->randomElement(['Pending', 'Active', 'Completed']),
        ];
    }
}
