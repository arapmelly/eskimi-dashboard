<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->catchPhrase(),
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'dailyBudget' => $this->faker->randomFloat(2, 100, 10000),
            'totalBudget' => $this->faker->randomFloat(2, 1000, 10000)
        ];
    }
}
