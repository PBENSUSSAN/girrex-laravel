<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RecommendationQS extends Model {
    use HasFactory;
    protected $table = 'recommendation_qs';
    protected $fillable = ['source_type', 'source_id', 'description', 'priorite', 'statut', 'date_emission', 'date_echeance', 'responsable_agent_id', 'destinataires_externes'];
    public function source() { return $this->morphTo(); }
}