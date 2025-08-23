<?php

namespace Database\Seeders;

use App\Models\Centre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On crée une liste de centres à insérer
        $centres = [
            [
                'nom_centre' => 'DGA Essais en vol Istres',
                'code_centre' => 'IS',
                'gere_aps' => true,
                'gere_tour' => false,
                'nombre_cabines' => 2,
            ],
            [
                'nom_centre' => 'DGA Maîtrise de l\'information',
                'code_centre' => 'MI',
                'gere_aps' => false,
                'gere_tour' => true,
                'nombre_cabines' => 1,
            ],
            [
                'nom_centre' => 'DGA Essais de missiles',
                'code_centre' => 'EM',
                'gere_aps' => true,
                'gere_tour' => true,
                'nombre_cabines' => 3,
            ]
        ];

        // On fait une boucle et on insère chaque centre
        foreach ($centres as $centre) {
            Centre::create($centre);
        }
    }
}