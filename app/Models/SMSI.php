<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SMSI extends Model
{
    use HasFactory;

    /**
     * RELATION : Le dossier SMSI appartient à un Centre.
     */
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    /**
     * RELATION : Le relais local est un Agent.
     */
    public function relaisLocal(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'relais_local_agent_id', 'id_agent');
    }

    /**
     * RELATION : Le manuel est un Document.
     */
    public function manuelManagement(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'manuel_management_doc_id');
    }

    /**
     * RELATION : Le programme de sûreté est un Document.
     */
    public function programmeSurete(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'programme_surete_doc_id');
    }

    /**
     * RELATION : Un dossier SMSI peut avoir plusieurs risques.
     */
    public function risques(): HasMany
    {
        return $this->hasMany(CyberRisque::class);
    }

    /**
     * RELATION : Un dossier SMSI peut avoir plusieurs incidents.
     */
    public function incidents(): HasMany
    {
        return $this->hasMany(CyberIncident::class);
    }
}