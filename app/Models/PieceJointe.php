<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PieceJointe extends Model
{
    use HasFactory;

    /**
     * RELATION : La personne qui a téléversé le fichier.
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploader_user_id');
    }

    /**
     * RELATION POLYMORPHE INVERSE : Une pièce jointe peut appartenir
     * à n'importe quel autre modèle (un incident, un risque, etc.).
     * C'est la traduction de GenericForeignKey.
     */
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}