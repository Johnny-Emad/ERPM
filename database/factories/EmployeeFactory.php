<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'job_title' => fake()->jobTitle(),
            'salary' => fake()->randomFloat(2, 3000, 15000),
            'hire_date' => fake()->date(),
        ];
    }
}
