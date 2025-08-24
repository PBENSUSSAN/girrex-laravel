<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MentionLinguistique extends Model
{
    use HasFactory;

    protected $table = 'mention_linguistiques';

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'brevet_id',
        'langue',
        'niveau_oaci',
        'date_evaluation',
        'date_echeance',
    ];

    /**
     * Les attributs qui doivent être convertis.
     */
    protected $casts = [
        'date_evaluation' => 'date',
        'date_echeance' => 'date',
    ];

    /**
     * RELATION : Une Mention Linguistique appartient à un Brevet.
     */
    public function brevet(): BelongsTo
    {
        return $this->belongsTo(Brevet::class);
    }
}