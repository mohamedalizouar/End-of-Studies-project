<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Product_name = $this->faker->unique()->word($nb=2,$astext=true);
        $slug=Str::slug($Product_name);
        $image_name=$this->faker->numberBetween(1,24).'.jpg';

        return [
            'name'=>Str::title($Product_name),
            'slug'=>$slug,
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(500),
            'regular_price'=>$this->faker->numberBetween(1,22),
            'SKU'=>'SMD'.$this->faker->numberBetween(100,500),
            'stock_status'=>'instock',
            'quantity'=>$this->faker->numberBetween(100,200),
            'image'=>$image_name,
            'images'=>$image_name,
            'categori_id'=>$this->faker->numberBetween(1,6),
            'brand_id'=>$this->faker->numberBetween(1,6)
        ];
    }
}
