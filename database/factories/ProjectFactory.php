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
            'bio' => fake()->paragraph(),
            'phone' => fake()->phoneNumber(),
            'avatar' => fake()->imageUrl(200, 200, 'people'),
            'social_links' => json_encode([
                'github' => 'https://github.com/' . fake()->userName(),
                'linkedin' => 'https://linkedin.com/in/' . fake()->userName(),
            ]),
        ];
    }
}
