<?php

namespace App\Models;

use App\Enums\StatutMiso;
use App\Enums\TypeMaintenance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Miso extends Model
{
    use HasFactory;

    /**
     * Applique le casting automatique des Enums.
     */
    protected $casts = [
        'type_maintenance' => TypeMaintenance::class,
        'statut_override' => StatutMiso::class,
        'date_debut' => 'datetime', // Indique que ces champs sont des objets date/heure
        'date_fin' => 'datetime',
    ];

    /**
     * RELATION : Un préavis MISO a un responsable (Agent).
     */
    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'responsable_id', 'id_agent');
    }

    /**
     * RELATION : Un préavis MISO concerne un Centre.
     */
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    /**
     * RELATION : Un préavis MISO a un historique d'événements.
     */
    public function historique(): HasMany
    {
        return $this->hasMany(Historique::class);
    }
}