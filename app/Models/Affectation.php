<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Affectation extends Model
{
    use HasFactory;

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }
    
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }
}