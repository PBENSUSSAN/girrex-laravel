<?php

namespace App\Models;

use App\Enums\CriticitePanne;
use App\Enums\StatutPanne;
use App\Enums\TypeEquipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PanneCentre extends Model
{
    use HasFactory;

    /**
     * Applique le casting automatique des Enums.
     */
    protected $casts = [
        'type_equipement' => TypeEquipement::class,
        'criticite' => CriticitePanne::class,
        'statut' => StatutPanne::class,
    ];

    /**
     * RELATION : Une panne concerne un Centre.
     */
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    /**
     * RELATION : Une panne a été consignée par un Agent.
     */
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'auteur_agent_id', 'id_agent');
    }
}