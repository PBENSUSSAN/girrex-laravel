<?php

namespace App\Models;

use App\Enums\CategorieFeedback;
use App\Enums\ModuleApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Feedback extends Model
{
    use HasFactory;

     protected $table = 'feedbacks'; 

    protected $fillable = [
        'titre',
        'description',
        'categorie',
        'module_concerne',
        'auteur_agent_id',
    ];

    protected $casts = [
        'categorie' => CategorieFeedback::class,
        'module_concerne' => ModuleApp::class,
    ];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'auteur_agent_id', 'id_agent');
    }

    public function actionSuivi(): MorphMany
    {
        return $this->morphMany(ActionSuivi::class, 'objet_source');
    }
}