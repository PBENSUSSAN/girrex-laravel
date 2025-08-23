<?php

namespace App\Models;

use App\Enums\StatutMua;
use App\Enums\TypeFluxMua;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mua extends Model
{
    use HasFactory;

    /**
     * Applique le casting automatique des Enums.
     */
    protected $casts = [
        'type_flux' => TypeFluxMua::class,
        'statut' => StatutMua::class,
    ];

    /**
     * RELATION : Une MUA est rattachée à une Qualification.
     */
    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }
}