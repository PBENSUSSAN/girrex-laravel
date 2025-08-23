<?php

namespace App\Models;

use App\Enums\GraviteCyberRisque;
use App\Enums\ProbabiliteCyberRisque;
use App\Enums\StatutCyberRisque;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CyberRisque extends Model
{
    use HasFactory;

    protected $casts = [
        'gravite' => GraviteCyberRisque::class,
        'probabilite' => ProbabiliteCyberRisque::class,
        'statut' => StatutCyberRisque::class,
    ];

    public function smsi(): BelongsTo
    {
        return $this->belongsTo(SMSI::class);
    }

    /**
     * RELATION POLYMORPHE : Un risque peut avoir plusieurs actions de suivi.
     * C'est la traduction de GenericRelation('suivi.Action').
     */
    public function actions(): MorphMany
    {
        // 'objet_source' est le nom que nous avons donné à la relation morphs()
        // dans la migration de la table 'action_suivis'.
        return $this->morphMany(ActionSuivi::class, 'objet_source');
    }
}