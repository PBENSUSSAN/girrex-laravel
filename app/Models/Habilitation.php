<?php

namespace App\Models;

use App\Enums\StatutChoix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habilitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'type_hab',
        'date_obtention',
        'date_expiration',
        'statut',
    ];

    protected $casts = [
        'statut' => StatutChoix::class,
        'date_obtention' => 'date',
        'date_expiration' => 'date',
    ];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}