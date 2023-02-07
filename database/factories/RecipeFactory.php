<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'title' => $this->faker->foodName(),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et vehicula magna. Sed luctus est nec fringilla suscipit. Sed et.'
        ];
    }
}
