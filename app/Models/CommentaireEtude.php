<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CommentaireEtude extends Model {
    protected $table = 'commentaire_etudes';
    protected $fillable = ['etude_id', 'auteur_agent_id', 'commentaire', 'piece_jointe'];
}