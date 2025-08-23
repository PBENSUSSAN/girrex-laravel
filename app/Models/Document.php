<?php

namespace App\Models;

use App\Enums\StatutDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;

    protected $casts = [
        'statut' => StatutDocument::class,
        'date_mise_en_vigueur' => 'date',
        'date_prochaine_echeance' => 'date',
    ];

    /** RELATION : Appartient à un type de document. */
    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    /** RELATION : Le responsable du suivi est un Agent. */
    public function responsableSuivi(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'responsable_suivi_agent_id', 'id_agent');
    }

    /** RELATION : Ce document remplace un autre document (relation 1-à-1). */
    public function remplaceDocument(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'remplace_document_id');
    }

    /** RELATION INVERSE : Ce document est remplacé par un autre (relation 1-à-1). */
    public function remplacePar(): HasOne
    {
        return $this->hasOne(Document::class, 'remplace_document_id');
    }

    /** RELATION : Cet avenant est rattaché à un document parent. */
    public function documentParent(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_parent_id');
    }

    /** RELATION : Ce document principal peut avoir plusieurs avenants. */
    public function avenants(): HasMany
    {
        return $this->hasMany(Document::class, 'document_parent_id');
    }

    /** RELATION : Peut être applicable à plusieurs Centres (ManyToMany). */
    public function centresApplicables(): BelongsToMany
    {
        return $this->belongsToMany(
            Centre::class,
            'centre_document',
            'document_id',
            'centre_id'
        );
    }

    /** RELATION : Peut avoir plusieurs enregistrements de prise en compte. */
    public function prisesEnCompte(): HasMany
    {
        return $this->hasMany(DocumentPriseEnCompte::class);
    }
}