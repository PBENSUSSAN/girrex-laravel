<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuiviFormationReglementaire extends Model
{
    use HasFactory;

    protected $table = 'suivi_formation_reglementaires';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'brevet_id',
        'formation_id',
        'date_realisation',
        'date_echeance',
    ];

    /**
     * Les attributs qui doivent être convertis.
     */
    protected $casts = [
        'date_realisation' => 'date',
        'date_echeance' => 'date',
    ];

    /**
     * RELATION : Un suivi concerne un Brevet.
     */
    public function brevet(): BelongsTo
    {
        return $this->belongsTo(Brevet::class);
    }

    /**
     * RELATION : Un suivi concerne une Formation du catalogue.
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(FormationReglementaire::class, 'formation_id');
    }
}