<?php

namespace App\Filament\Pages;

use App\Models\Vol; // <-- On importe le modèle Vol
use Filament\Pages\Page;
use Carbon\Carbon; // <-- On importe Carbon pour gérer les dates

class CahierDeMarche extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static string $view = 'filament.pages.cahier-de-marche';

    protected static ?string $navigationGroup = 'Opérations';

    // Propriétés publiques qui seront accessibles dans la vue
    public $volsDuJour;
    public $dateAffichee;

    /**
     * Cette méthode est appelée quand la page est initialisée.
     * C'est l'équivalent du constructeur.
     */
    public function mount(): void
    {
        // On définit la date d'aujourd'hui
        $this->dateAffichee = Carbon::today();

        // On va chercher les vols prévus pour aujourd'hui
        // On charge aussi les relations 'centre' et 'saisiesActivites.agent' pour optimiser
        $this->volsDuJour = Vol::whereDate('date_vol', $this->dateAffichee)
            ->with(['centre', 'saisiesActivites.agent'])
            ->orderBy('heure_debut_prevue')
            ->get();
    }
}