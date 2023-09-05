<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Classe;
use App\Models\Etudiant;
use Database\Factories\ClasseFactory;
use Database\Factories\EtudiantFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClasseSeeder::class);
        Etudiant::factory(15)->create();
    }
}
