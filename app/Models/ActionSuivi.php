<?php

namespace App\Models;

use App\Enums\CategorieAction;
use App\Enums\PrioriteAction;
use App\Enums\StatutAction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActionSuivi extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_action',
        'titre',
        'description',
        'categorie',
        'responsable_agent_id',
        'echeance',
        'priorite',
        'statut',
        'avancement',
        'parent_id',
        'objet_source_type',
        'objet_source_id',
        'echeance_proposee',
    ];

    protected $casts = [
        'categorie' => CategorieAction::class,
        'statut' => StatutAction::class,
        'priorite' => PrioriteAction::class,
        'echeance' => 'date',
        'echeance_proposee' => 'date',
    ];

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'responsable_agent_id', 'id_agent');
    }

    public function centres(): BelongsToMany
    {
        return $this->belongsToMany(Centre::class, 'action_centre');
    }

    /**
     * RELATION POLYMORPHE : L'objet qui a déclenché cette action.
     */
    public function objetSource(): MorphTo
    {
        return $this->morphTo();
    }
}