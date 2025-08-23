<?php

namespace App\Models;

use App\Enums\TypeFlux;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vol extends Model
{
    use HasFactory;

    /**
     * Indique à Laravel de traiter automatiquement la colonne 'flux'
     * comme un objet de notre classe Enum 'TypeFlux'.
     */
    protected $casts = [
        'flux' => TypeFlux::class,
    ];

    /**
     * RELATION : Un Vol appartient à un Centre.
     */
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    /**
     * RELATION : Un Vol (mission) peut avoir plusieurs relèves (qui sont aussi des vols).
     */
    public function releves(): HasMany
    {
        return $this->hasMany(Vol::class, 'parent_vol_id');
    }

    /**
     * RELATION : Un Vol (relève) peut appartenir à un Vol d'origine (mission).
     */
    public function parentVol(): BelongsTo
    {
        return $this->belongsTo(Vol::class, 'parent_vol_id');
    }
    
    /**
     * RELATION : Un Vol peut avoir plusieurs saisies d'activité.
     */
    public function saisiesActivites(): HasMany
    {
        return $this->hasMany(SaisieActivite::class);
    }

    /**
     * ACCESSEUR : C'est la traduction de votre propriété Django `duree_reelle`.
     * Laravel appellera automatiquement cette fonction quand on accédera à `$vol->duree_reelle`.
     */
    public function getDureeReelleAttribute(): float
    {
        if (!$this->heure_debut_reelle || !$this->heure_fin_reelle) {
            return 0.0;
        }

        // Carbon est un outil de gestion des dates/heures inclus dans Laravel
        $start = Carbon::parse($this->date_vol . ' ' . $this->heure_debut_reelle);
        $end = Carbon::parse($this->date_vol . ' ' . $this->heure_fin_reelle);

        // Gère le cas où le vol se termine le lendemain (après minuit)
        if ($end->isBefore($start)) {
            $end->addDay();
        }

        // Calcule la différence en secondes et la convertit en heures
        return $start->diffInSeconds($end) / 3600;
    }
}