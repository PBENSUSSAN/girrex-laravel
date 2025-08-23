<?php

namespace App\Http\Controllers;

use App\Models\Agent; // <-- On importe le modèle Agent
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        // On récupère tous les agents, triés par trigramme.
        // IMPORTANT : ->with('centre') est une optimisation.
        // On dit à Laravel de récupérer les informations du centre en même temps.
        // Cela évite de faire une requête à la base de données pour chaque agent.
        $agents = Agent::orderBy('trigram')->with('centre')->get();

        // On envoie les données à la vue 'agents.index'
        return view('agents.index', [
            'agents' => $agents
        ]);
    }
}