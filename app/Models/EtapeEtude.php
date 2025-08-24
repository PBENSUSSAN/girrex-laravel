<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EtapeEtude extends Model {
    protected $table = 'etape_etudes';
    protected $fillable = ['etude_id', 'nom', 'document_preuve', 'mrr_identifies', 'validee_par_local', 'date_validation_local', 'validee_par_national', 'date_validation_national'];
}