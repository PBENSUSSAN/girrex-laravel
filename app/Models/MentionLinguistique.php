<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MentionLinguistique extends Model
{
    use HasFactory;

    /**
     * RELATION : Une Mention Linguistique appartient à un Brevet.
     */
    public function brevet(): BelongsTo
    {
        return $this->belongsTo(Brevet::class);
    }
}