<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $menu_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($menu_name, '-');
        return [
            'name' => $menu_name,
            'slug' => $slug,
            'description' => $this->faker->text(200),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'quantity' => $this->faker->numberBetween(10, 50),
            'image' => 'menu-' . $this->faker->numberBetween(1, 13) . '.jpeg',
        ];
    }
}
