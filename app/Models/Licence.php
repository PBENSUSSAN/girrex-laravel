<?php
namespace App\Models;

use App\Enums\StatutChoix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Licence extends Model
{
    use HasFactory;

    protected $casts = ['statut' => StatutChoix::class];
    
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id_agent');
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class);
    }
    
    public function mentions(): HasMany
    {
        return $this->hasMany(Mention::class);
    }
}