<?php
namespace App\Models;

use App\Enums\ResultatChoix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;

    protected $casts = ['resultat' => ResultatChoix::class];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
}