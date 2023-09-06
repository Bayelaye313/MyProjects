<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomComplet' => $this->faker->lastName . ' ' . $this->faker->firstName,
            'Email' => $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->phoneNumber,
            'Salaire' => $this->faker->randomFloat(2, 1000, 5000)
        ];
    }
}
