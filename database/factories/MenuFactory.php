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
            'name' => $this->faker->word(),
            'items' => collect([1, 2, 3])
                ->map(fn () => [
                    'title' => $this->faker->word(),
                    'url' => '/' . $this->faker->word(),
                    'type' => $this->faker->randomElement(['internal', 'external']),
                ])
                ->toArray(),
        ];
    }
}
