<?php

namespace App\Models;

use App\Enums\StatutQualification;
use App\Enums\TypeFlux;
use App\Enums\TypeQualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qualification extends Model
{
    use HasFactory;

    protected $table = 'qualifications';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'brevet_id',
        'centre_id',
        'type_flux',
        'type_qualification',
        'date_obtention',
        'statut',
    ];

    /**
     * Applique le casting automatique des Enums et des dates.
     */
    protected $casts = [
        'type_flux' => TypeFlux::class,
        'type_qualification' => TypeQualification::class,
        'statut' => StatutQualification::class,
        'date_obtention' => 'date', // Bonne pratique d'ajouter les dates ici
    ];

    /**
     * RELATION : Une Qualification appartient à un Brevet.
     */
    public function brevet(): BelongsTo
    {
        return $this->belongsTo(Brevet::class);
    }

    /**
     * RELATION : Une Qualification a été délivrée par un Centre.
     */
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }
}