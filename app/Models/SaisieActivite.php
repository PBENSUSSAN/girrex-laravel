<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaisieActivite extends Model
{
    use HasFactory;

    /**
     * Indique à Laravel de traiter la colonne 'role' comme un Enum.
     */
    protected $casts = [
        'role' => Role::class,
    ];

    /**
     * RELATION : Une Saisie d'Activité appartient à un Vol.
     */
    public function vol(): BelongsTo
    {
        return $this->belongsTo(Vol::class);
    }

    /**
     * RELATION : Une Saisie d'Activité appartient à un Agent.
     */
    public function agent(): BelongsTo
    {
        // On doit spécifier la clé étrangère ('agent_id') et la clé du propriétaire ('id_agent')
        // car le modèle Agent utilise une clé primaire non standard.
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}