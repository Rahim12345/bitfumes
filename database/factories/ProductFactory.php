<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        return [
            'name'=>$faker->name,
            'detail'=>$faker->text(300),
            'price'=>$faker->numberBetween(1,100),
            'stock'=>$faker->numberBetween(1,100),
            'discount'=>$faker->numberBetween(1,100)
        ];
    }
}
