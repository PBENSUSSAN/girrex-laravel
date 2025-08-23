<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Centre; // On a besoin de récupérer les centres
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère les centres qu'on a déjà créés
        $centreIstres = Centre::where('code_centre', 'IS')->first();
        $centreMi = Centre::where('code_centre', 'MI')->first();

        // On crée quelques agents de test
        Agent::create([
            'id_agent' => 101,
            'centre_id' => $centreIstres->id,
            'trigram' => 'PBE',
            'nom' => 'BENSUSSAN',
            'prenom' => 'Patrick',
            'type_agent' => 'controleur',
        ]);
        
        Agent::create([
            'id_agent' => 102,
            'centre_id' => $centreMi->id,
            'trigram' => 'JDO',
            'nom' => 'DOE',
            'prenom' => 'John',
            'type_agent' => 'administratif',
        ]);
        
        Agent::create([
            'id_agent' => 103,
            'centre_id' => $centreIstres->id,
            'trigram' => 'ASM',
            'nom' => 'SMITH',
            'prenom' => 'Alice',
            'type_agent' => 'technique',
        ]);
    }
}