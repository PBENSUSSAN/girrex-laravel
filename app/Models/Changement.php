<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Changement extends Model {
    use HasFactory;
    protected $fillable = ['titre', 'description', 'initiateur_agent_id', 'centre_principal_id', 'fichier_notification_initiale', 'fichier_reponse_notification', 'classification', 'correspondant_dircam_agent_id', 'statut'];
    public function etudeSecurite() { return $this->hasOne(EtudeSecurite::class); }
}