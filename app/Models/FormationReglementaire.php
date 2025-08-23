<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormationReglementaire extends Model
{
    use HasFactory;

    /**
     * RELATION : Une formation du catalogue peut avoir plusieurs suivis.
     */
    public function suivis(): HasMany
    {
        return $this->hasMany(SuiviFormationReglementaire::class, 'formation_id');
    }
}