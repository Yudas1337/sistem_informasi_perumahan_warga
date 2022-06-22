<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HouseTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['21/24', '36', '45', '60', '70', '90', '120'];
        return [
            'type' => '21/24'
        ];
    }
}
