<?php

namespace App\Http\Controllers;

use App\Models\Centre; // <-- On importe notre modèle Centre
use Illuminate\Http\Request;

class CentreController extends Controller
{
    /**
     * C'est la méthode qui est appelée par notre route '/centres'.
     * Son but est d'afficher une liste de tous les centres.
     */
    public function index()
    {
        // ÉTAPE 1 : Le contrôleur demande au Modèle "Centre"
        // de lui donner tous les enregistrements de la table 'centres',
        // triés par 'code_centre'.
        $centres = Centre::orderBy('code_centre')->get();

        // ÉTAPE 2 : Le contrôleur demande à Laravel d'afficher une "vue"
        // et il lui passe les données qu'il vient de récupérer.
        // 'centres.index' signifie : cherche le fichier 'index.blade.php' dans le dossier 'centres'.
        // ['centres' => $centres] est le tableau de données qu'on envoie à la vue.
        // La clé 'centres' sera le nom de la variable dans la vue.
        return view('centres.index', [
            'centres' => $centres
        ]);
    }

    public function create()
    {
        // On retourne simplement la vue qui contient le formulaire.
        return view('centres.create');
    }

    /**
     * Enregistre un nouveau centre dans la base de données.
     */
    public function store(Request $request)
    {
        // Étape 1 : Validation des données reçues du formulaire
        $request->validate([
            'nom_centre' => 'required|string|max:255|unique:centres',
            'code_centre' => 'required|string|max:10|unique:centres',
            'nombre_cabines' => 'required|integer|min:0',
            // 'gere_aps' et 'gere_tour' sont des cases à cocher, pas besoin de validation complexe
        ]);

        // Étape 2 : Création du nouveau centre avec les données validées
        Centre::create([
            'nom_centre' => $request->nom_centre,
            'code_centre' => $request->code_centre,
            'nombre_cabines' => $request->nombre_cabines,
            'gere_aps' => $request->has('gere_aps'), // Renvoie true si la case est cochée
            'gere_tour' => $request->has('gere_tour'), // Renvoie false sinon
        ]);

        // Étape 3 : Redirection vers la liste des centres avec un message de succès
        return redirect()->route('centres.index')->with('success', 'Le centre a été créé avec succès !');
    }
}