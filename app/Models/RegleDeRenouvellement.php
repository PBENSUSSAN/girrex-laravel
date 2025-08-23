<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RegleDeRenouvellement extends Model
{
    use HasFactory;

    /**
     * RELATION : Une règle peut s'appliquer à plusieurs centres.
     */
    public function centres(): BelongsToMany
    {
        return $this->belongsToMany(
            Centre::class,
            'centre_regle_de_renouvellement', // Nom de la table pivot
            'regle_de_renouvellement_id',    // Clé étrangère de ce modèle dans la table pivot
            'centre_id'                      // Clé étrangère de l'autre modèle dans la table pivot
        );
    }
}