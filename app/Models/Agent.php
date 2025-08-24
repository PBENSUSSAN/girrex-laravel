<?php

namespace App\Models;

use App\Enums\TypeAgent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';
    protected $primaryKey = 'id_agent';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'centre_id',
        'nom',
        'prenom',
        'trigramme',
        'date_de_naissance',
        'actif',
        'type',
    ];

    /**
     * Les attributs qui doivent être convertis.
     */
    protected $casts = [
        'date_de_naissance' => 'date',
        'actif' => 'boolean',
        'type' => TypeAgent::class,
    ];

    /**
     * Crée un attribut virtuel qui combine le nom et le prénom.
     */
    protected function nomComplet(): Attribute
    {
        return Attribute::make(
            get: fn () => strtoupper($this->nom) . ' ' . $this->prenom,
        );
    }

    /**
     * --- CORRECTION 1 ---
     * Spécifie que la colonne 'id_agent' doit être utilisée pour le model binding.
     * C'est la clé pour que les URLs générées par Filament pour cette ressource soient correctes.
     */
    public function getRouteKeyName()
    {
        return 'id_agent';
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function brevet(): HasOne
    {
        return $this->hasOne(Brevet::class, 'agent_id', 'id_agent');
    }

    public function formationsContinues(): HasMany
    {
        // NOTE: Cette relation devra être déplacée vers le Brevet si nous suivons la nouvelle logique
        return $this->hasMany(SuiviFormationContinue::class, 'agent_id', 'id_agent');
    }
}