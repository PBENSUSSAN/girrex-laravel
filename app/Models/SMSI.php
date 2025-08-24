<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; // <-- Assurez-vous que cette ligne est bien présente
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SMSI extends Model
{
    use HasFactory;

    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'smsis';

    protected $fillable = [
        'centre_id',
        'relais_local_agent_id',
        'manuel_management_doc_id',
        'programme_surete_doc_id',
    ];

    /**
     * Crée un attribut virtuel 'nom' pour le modèle SMSI,
     * qui retourne le nom du centre associé.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function nom(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->centre?->nom, // Le '?' évite une erreur si le centre n'est pas trouvé
        );
    }

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function relaisLocal(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'relais_local_agent_id', 'id_agent');
    }

    public function manuelManagement(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'manuel_management_doc_id');
    }

    public function programmeSurete(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'programme_surete_doc_id');
    }

    public function risques(): HasMany
    {
        return $this->hasMany(CyberRisque::class);
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(CyberIncident::class);
    }
}