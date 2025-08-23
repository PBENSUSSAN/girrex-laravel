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

    protected $fillable = [
        'reference',
        'intitule',
        'document_type_id',
        'description',
        'fichier_pdf',
        'responsable_suivi_agent_id',
        'statut',
        'date_mise_en_vigueur',
        'periodicite_relecture_mois',
        'date_prochaine_echeance',
        'remplace_document_id',
        'document_parent_id',
    ];

    protected $casts = [
        'statut' => StatutDocument::class,
        'date_mise_en_vigueur' => 'date',
        'date_prochaine_echeance' => 'date',
    ];

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function responsableSuivi(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'responsable_suivi_agent_id', 'id_agent');
    }

    public function remplaceDocument(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'remplace_document_id');
    }

    public function remplacePar(): HasOne
    {
        return $this->hasOne(Document::class, 'remplace_document_id');
    }

    public function documentParent(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_parent_id');
    }

    public function avenants(): HasMany
    {
        return $this->hasMany(Document::class, 'document_parent_id');
    }

    public function centresApplicables(): BelongsToMany
    {
        return $this->belongsToMany(
            Centre::class,
            'centre_document',
            'document_id',
            'centre_id'
        );
    }

    public function prisesEnCompte(): HasMany
    {
        return $this->hasMany(DocumentPriseEnCompte::class);
    }
}