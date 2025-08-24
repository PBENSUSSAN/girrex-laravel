<?php

namespace App\Models;

use App\Enums\TypeFormationContinue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuiviFormationContinue extends Model
{
    use HasFactory;

    protected $table = 'suivi_formation_continues';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'brevet_id',
        'type_formation',
        'date_realisation',
    ];

    /**
     * Applique le casting automatique de l'Enum.
     */
    protected $casts = [
        'type_formation' => TypeFormationContinue::class,
        'date_realisation' => 'date',
    ];

    /**
     * RELATION : Un suivi de formation continue est réalisé par un Agent.
     */
    public function brevet(): BelongsTo
    {
        return $this->belongsTo(Brevet::class);
    }
}