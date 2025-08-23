<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brevet extends Model
{
    use HasFactory;

    /**
     * La "liste blanche" des champs autorisés.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agent_id',
        'numero_brevet',
        'date_delivrance',
    ];


    /**
     * RELATION : Un Brevet appartient à un seul Agent.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }

    /**
     * RELATION : Un Brevet peut avoir plusieurs Qualifications.
     */
    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class);
    }

    /**
     * RELATION : Un Brevet peut avoir plusieurs Mentions Linguistiques.
     */
    public function mentionsLinguistiques(): HasMany
    {
        return $this->hasMany(MentionLinguistique::class);
    }
}

