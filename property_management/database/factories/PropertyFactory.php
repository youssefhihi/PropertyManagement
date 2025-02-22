<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $owner = Owner::factory()->create();
        return [
            'owner_id' => $owner->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'local' => $this->faker->city(),
            'price' => $this->faker->numberBetween(100, 1000),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['available', 'rented']),
        ];
    }
}
