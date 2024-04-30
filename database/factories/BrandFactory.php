<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueBrandName = $this->faker->word($nb = 2, $asText = true);
        while (\App\Models\Brand::where('name', $uniqueBrandName)->exists()) {
            $uniqueBrandName = $this->faker->word($nb = 2, $asText = true);
        }

        return [
            'name' => $this->faker->unique()->word,
            'slug' => $this->faker->unique()->slug,
            'image' => $this->faker->numberBetween(1, 6) . '.jpg',
        ];
    }
}
