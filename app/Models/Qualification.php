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

    /**
     * Applique le casting automatique des Enums.
     */
    protected $casts = [
        'type_flux' => TypeFlux::class,
        'type_qualification' => TypeQualification::class,
        'statut' => StatutQualification::class,
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