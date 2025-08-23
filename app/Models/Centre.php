<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Centre extends Model
{
    use HasFactory;

    /**
     * La "liste blanche" des colonnes que l'on a le droit
     * de remplir via la méthode create() ou update().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom_centre',
        'code_centre',
        'gere_aps',
        'gere_tour',
        'nombre_cabines',
    ];


    /**
     * RELATION : Un Centre peut avoir plusieurs Agents.
     */
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class, 'centre_id', 'id');
    }

    /**
     * RELATION : Un centre peut être soumis à plusieurs règles de renouvellement.
     */
    public function reglesDeRenouvellement(): BelongsToMany
    {
        return $this->belongsToMany(
            RegleDeRenouvellement::class,
            'centre_regle_de_renouvellement',
            'centre_id',
            'regle_de_renouvellement_id'
        );
    }
}