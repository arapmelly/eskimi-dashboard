<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use File;

class CreativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = storage_path('app/public/images');

        if(!File::exists($filePath)){
            File::makeDirectory($filePath);  //follow the declaration to see the complete signature
        }

        return [
            'name' => $this->faker->text(10),
            'fileUrl' => $this->faker->image($filePath,400,300)
        ];
    }
}
