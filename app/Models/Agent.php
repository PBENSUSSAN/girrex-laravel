<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_agent';
    public $incrementing = false;

    // IMPORTANT : On ajoute la propriété fillable pour autoriser la création
    protected $fillable = [
        'id_agent',
        'centre_id',
        'user_id',
        'reference',
        'trigram',
        'nom',
        'prenom',
        'date_naissance',
        'nationalite',
        'actif',
        'type_agent',
    ];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class, 'centre_id', 'id');
    }

    public function brevet(): HasOne
    {
        return $this->hasOne(Brevet::class, 'agent_id', 'id_agent');
    }

    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class, 'agent_id', 'id_agent');
    }

    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class, 'agent_id', 'id_agent');
    }

    public function habilitations(): HasMany
    {
        return $this->hasMany(Habilitation::class, 'agent_id', 'id_agent');
    }
}