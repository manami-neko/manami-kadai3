<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 70),
            'calories' => $this->faker->numberBetween(1000, 2500),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->realText(20),
        ];
    }
}
