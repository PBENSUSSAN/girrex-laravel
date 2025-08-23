<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuiviFormationReglementaire extends Model
{
    use HasFactory;

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