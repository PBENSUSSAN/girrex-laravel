<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EtudeSecurite extends Model {
    use HasFactory;
    protected $table = 'etude_securites';
    protected $fillable = ['reference_etude', 'changement_id', 'type_etude', 'plan_securite_pdf', 'fichier_approbation_finale', 'statut', 'avancement'];
    public function changement() { return $this->belongsTo(Changement::class); }
    public function etapes() { return $this->hasMany(EtapeEtude::class, 'etude_id'); }
    public function commentaires() { return $this->hasMany(CommentaireEtude::class, 'etude_id'); }
    public function mrrs() { return $this->hasMany(MRR::class, 'etude_id'); }
    public function actions_suivi() { return $this->morphMany(ActionSuivi::class, 'objet_source'); }
}