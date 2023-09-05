<?php

namespace Database\Factories;

use App\Models\Etudiant;
use app\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    protected $model= Etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'nom' => $this->faker->lastName(),
                'prenom' => $this->faker->firstName(),
                'classe_id' => rand(1, 7),
            ];
        }
            
}
