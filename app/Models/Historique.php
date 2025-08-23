<?php

namespace App\Models;

use App\Enums\TypeEvenementHistorique;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historique extends Model
{
    use HasFactory;

    /**
     * Applique le casting automatique de l'Enum et du champ JSON.
     */
    protected $casts = [
        'type_evenement' => TypeEvenementHistorique::class,
        'details' => 'array',
    ];

    /**
     * RELATION : Une entrée d'historique appartient à un préavis MISO.
     */
    public function miso(): BelongsTo
    {
        return $this->belongsTo(Miso::class);
    }

    /**
     * RELATION : Une entrée d'historique a été créée par un Utilisateur.
     * Laravel a un modèle User par défaut, nous l'utiliserons.
     */
    public function auteur(): BelongsTo
    {
        // 'User' est le modèle d'utilisateur standard de Laravel
        return $this->belongsTo(User::class, 'auteur_user_id');
    }
}