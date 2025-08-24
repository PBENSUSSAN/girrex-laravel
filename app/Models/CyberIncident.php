<?php
namespace App\Models;
use App\Enums\StatutCyberIncident;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CyberIncident extends Model
{
    use HasFactory;
    protected $fillable = ['smsi_id', 'date', 'description', 'statut', 'source_panne_id'];
    protected $casts = ['statut' => StatutCyberIncident::class, 'date' => 'datetime'];
    public function smsi(): BelongsTo { return $this->belongsTo(SMSI::class); }
    public function sourcePanne(): BelongsTo { return $this->belongsTo(PanneCentre::class, 'source_panne_id'); }
    public function actions(): MorphMany { return $this->morphMany(ActionSuivi::class, 'objet_source'); }
}