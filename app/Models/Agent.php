<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;

    /**
     * Indique à Laravel que la clé primaire de cette table n'est pas 'id'.
     * C'est une étape cruciale car votre structure est non-standard.
     */
    protected $primaryKey = 'id_agent';

    /**
     * Indique à Laravel que la clé primaire n'est pas un entier qui s'incrémente.
     */
    public $incrementing = false;

    /**
     * Définit la relation inverse : un Agent appartient à un Centre.
     * C'est l'équivalent de la ForeignKey en Django.
     */
    public function centre(): BelongsTo
    {
        // On spécifie la clé étrangère 'centre_id' sur ce modèle,
        // et la clé locale 'id' sur le modèle Centre.
        return $this->belongsTo(Centre::class, 'centre_id', 'id');
    }

    public function brevet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Brevet::class, 'agent_id', 'id_agent');
    }
}