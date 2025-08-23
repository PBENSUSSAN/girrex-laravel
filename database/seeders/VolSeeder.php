<?php

namespace Database\Seeders;

use App\Models\Centre;
use App\Models\Vol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On récupère les centres créés par le CentreSeeder
        $centreIstres = Centre::where('code_centre', 'IS')->first();
        $centreMi = Centre::where('code_centre', 'MI')->first();

        // On s'assure qu'on a bien des centres avant de continuer
        if (!$centreIstres || !$centreMi) {
            $this->command->error('Les centres de test n\'ont pas été trouvés. Lancez d\'abord le CentreSeeder.');
            return;
        }

        // --- Création d'une mission (un vol parent) ---
        $mission = Vol::create([
            'centre_id' => $centreIstres->id,
            'indicatif' => 'MISSION_ALPHA',
            'flux' => \App\Enums\TypeFlux::CAM,
            'date_vol' => now()->toDateString(),
            'heure_debut_prevue' => '08:00:00',
            'duree_prevue_secondes' => 7200, // 2 heures
            'heure_debut_reelle' => '08:05:00',
            'heure_fin_reelle' => '10:10:00',
        ]);

        // --- Création d'une relève rattachée à la mission ---
        Vol::create([
            'parent_vol_id' => $mission->id, // <-- On lie cette relève à la mission
            'centre_id' => $centreIstres->id,
            'indicatif' => 'RELEVE_1',
            'flux' => \App\Enums\TypeFlux::CAM,
            'date_vol' => now()->toDateString(),
            'heure_debut_prevue' => '08:00:00',
            'duree_prevue_secondes' => 3600,
            'heure_debut_reelle' => '08:05:00',
            'heure_fin_reelle' => '09:05:00',
        ]);

        // --- Création d'un autre vol indépendant ---
        Vol::create([
            'centre_id' => $centreMi->id,
            'indicatif' => 'VOL_BETA',
            'flux' => \App\Enums\TypeFlux::TOUR,
            'date_vol' => now()->subDay()->toDateString(), // La veille
            'heure_debut_prevue' => '14:00:00',
            'duree_prevue_secondes' => 5400, // 1h30
            'heure_debut_reelle' => '14:15:00',
            'heure_fin_reelle' => '15:40:00',
        ]);
    }
}