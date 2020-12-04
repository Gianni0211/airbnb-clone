<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'subtitle' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'description' => $this->faker->sentence($nbWords = 20, $variableNbWords = true),
            'guest_number' => rand(0,15),
            'price' => rand(0,1000) / 10, 
            'user_id' => User::factory()->create()->id,
            'place_id' => 1,
            'category_id' => rand(1,3),
        ];
    }
}
