<?php

namespace App\Models;

use App\Enums\TypeFormationContinue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuiviFormationContinue extends Model
{
    use HasFactory;

    /**
     * Applique le casting automatique de l'Enum.
     */
    protected $casts = [
        'type_formation' => TypeFormationContinue::class,
    ];

    /**
     * RELATION : Un suivi de formation continue est réalisé par un Agent.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}