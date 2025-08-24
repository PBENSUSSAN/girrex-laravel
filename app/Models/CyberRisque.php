<?php
namespace App\Models;
use App\Enums\GraviteCyberRisque;
use App\Enums\ProbabiliteCyberRisque;
use App\Enums\StatutCyberRisque;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CyberRisque extends Model
{
    use HasFactory;
    protected $fillable = ['smsi_id', 'description', 'gravite', 'probabilite', 'statut'];
    protected $casts = [
        'gravite' => GraviteCyberRisque::class,
        'probabilite' => ProbabiliteCyberRisque::class,
        'statut' => StatutCyberRisque::class,
    ];
    public function smsi(): BelongsTo { return $this->belongsTo(SMSI::class); }
    public function actions(): MorphMany { return $this->morphMany(ActionSuivi::class, 'objet_source'); }
}