<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Patient;
use App\Models\User;
use Database\Factories\PatientFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tableau des départements à créer
        $departements = [
            [
                'intitule' => 'Cardiology',
                'description' => 'Department of Cardiology',
            ],
            [
                'intitule' => 'Neurology',
                'description' => 'Department of Neurology',
            ],
            [
                'intitule' => 'Pediatrics',
                'description' => 'Department of Pediatrics',
            ],
            // Ajoutez d'autres départements ici...
        ];

        // Boucle pour créer chaque département
        foreach ($departements as $departement) {
            Departement::factory()->create([
                'intitule' => $departement['intitule'],
                'description' => $departement['description']
            ]);
        }


        User::factory()->create([
            'name' => 'Test User',
            'firstname' => 'John',
            'phone' => '123',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'role'=>'Admin',
        ]);

        Patient::factory(20);
    }
}
