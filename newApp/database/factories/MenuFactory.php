<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name'=>fake()->name(),
            'category'=>fake()->word(),
            'price'=>fake()->numberBetween(0,100),
            'description'=>fake()->paragraph(1),
            'image'=>fake()->image()
        ];
    }
}
