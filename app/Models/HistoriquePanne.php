<?php

namespace App\Models;

use App\Enums\TypeEvenementHistorique;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriquePanne extends Model
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
     * RELATION : Une entrée d'historique appartient à une Panne.
     */
    public function panne(): BelongsTo
    {
        return $this->belongsTo(PanneCentre::class, 'panne_id');
    }

    /**
     * RELATION : Une entrée d'historique a été créée par un Utilisateur.
     */
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auteur_user_id');
    }
}