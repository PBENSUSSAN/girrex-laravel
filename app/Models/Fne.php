<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Fne extends Model {
    use HasFactory;
    protected $table = 'fnes';
    protected $fillable = ['id_girrex', 'titre', 'date_evenement', 'description_globale', 'numero_oasis', 'centre_id', 'agent_implique_id', 'type_evenement', 'statut_fne', 'date_declaration_oasis', 'echeance_cloture', 'classification_gravite_atm', 'classification_gravite_ats', 'classification_probabilite', 'rapport_cloture_pdf', 'presente_en_cdsa_cmsa', 'type_cloture', 'date_demande_prolongation', 'motif_prolongation', 'nouvelle_echeance'];
    public function recommendations() { return $this->morphMany(RecommendationQS::class, 'source'); }
    public function rapportsExternes() { return $this->hasMany(RapportExterne::class); }
    public function historiquePermanent() { return $this->hasMany(HistoriqueFNE::class); }
}