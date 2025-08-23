<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentPriseEnCompte extends Model
{
    use HasFactory;

    // Laravel ne gère pas les timestamps `created_at` `updated_at` sur ce modèle
    // car notre migration ne les a pas créés (on a juste `timestamp`).
    public $timestamps = false;

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    /** RELATION : Concerne un Document. */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    /** RELATION : Réalisée par un Agent. */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}