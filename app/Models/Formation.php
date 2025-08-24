<?php

namespace App\Models;

use App\Enums\ResultatChoix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_formation';
    public $incrementing = false;

    protected $fillable = [
        'id_formation',
        'agent_id',
        'module_id',
        'organisme_id',
        'date',
        'annee',
        'duree',
        'resultat',
    ];

    protected $casts = [
        'resultat' => ResultatChoix::class,
        'date' => 'date',
    ];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'id_module');
    }

    public function organisme(): BelongsTo
    {
        return $this->belongsTo(Organisme::class);
    }
}