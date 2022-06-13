<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'=>Category::select('id')->get()->random(),
            'title'=>$this->faker->unique()->jobTitle(),
            'description'=>$this->faker->realText(),
            'price'=>rand(1000, 10000),
        ];
    }
}
