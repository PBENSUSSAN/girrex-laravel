<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MRR extends Model {
    protected $table = 'mrrs';
    protected $fillable = ['etude_id', 'description', 'auteur_agent_id'];
}