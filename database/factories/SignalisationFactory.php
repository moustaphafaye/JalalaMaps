<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Signalisation>
 */
class SignalisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
           'numeroSignalisation'=>fake()->unique()->numerify(),
           'date'=>fake()->dateTime(),
           'commentaire'=>fake()->realText(),
           'typeSignalisation'=>fake()->paragraph(),
           'image'=>fake()->image(),
           'niveauSignalisation'=>fake()->sentence()
           
        ];
    }
}
