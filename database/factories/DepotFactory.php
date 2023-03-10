<?php

namespace Database\Factories;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depot>
 */
class DepotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle'=>fake()->unique()->sentence(),
            'image'=>fake()->image(),
            'description'=>fake()->paragraph(),
            'lieu'=>fake()->sentence(),
            'telephone'=>fake()->numberBetween($min = 77000000 ,$max = 77000000),
            'etat'=>fake()->sentence(),
            // 'created_at'=>now()

            


        ];
    }
}
