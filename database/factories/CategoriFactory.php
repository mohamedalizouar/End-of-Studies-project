<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categori>
 */
class CategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Categori_name = $this->faker->unique()->word($nb=2,$astext=true);
        $slug=Str::slug($Categori_name);
        return [
           'name'=>Str::title($Categori_name),
           'slug'=>$slug,
           'image'=>$this->faker->numberBetween(1,6).'.jpg'

        ];
    }
}
