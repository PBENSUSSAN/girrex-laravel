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
     * La liste des champs autorisés à être remplis massivement.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vol_id',
        'agent_id',
        'role',
    ];

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
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}