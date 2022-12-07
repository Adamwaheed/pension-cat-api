<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bread_name' => $this->faker->name,
            'temperament' => $this->faker->sentence,
            'lifespan' => $this->faker->sentence,
            'avg_weight_female' =>rand(9,20),
            'avg_weight_male' =>rand(15,25),
            'coat_type' =>$this->faker->randomElement(['none','short','medium','long']),
            'coat_density' =>$this->faker->randomElement(['low','medium','high'])
        ];
    }
}
