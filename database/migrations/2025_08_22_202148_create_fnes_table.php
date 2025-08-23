<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fnes', function (Blueprint $table) {
            $table->id();
            $table->string('id_girrex', 50)->unique();
            $table->string('titre', 255);
            $table->date('date_evenement');
            $table->text('description_globale')->nullable();
            $table->string('numero_oasis', 100)->nullable()->unique();
            $table->foreignId('centre_id')->constrained('centres')->restrictOnDelete();
            $table->foreignId('agent_implique_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->string('type_evenement', 20)->default('AUTRE');
            $table->string('statut_fne', 30)->default('PRE_DECLAREE');
            $table->date('date_declaration_oasis')->nullable();
            $table->date('echeance_cloture')->nullable();
            $table->string('classification_gravite_atm', 100)->nullable();
            $table->string('classification_gravite_ats', 100)->nullable();
            $table->string('classification_probabilite', 100)->nullable();
            $table->string('rapport_cloture_pdf')->nullable();
            $table->boolean('presente_en_cdsa_cmsa')->default(false);
            $table->string('type_cloture', 20)->default('STANDARD');
            $table->date('date_demande_prolongation')->nullable();
            $table->text('motif_prolongation')->nullable();
            $table->date('nouvelle_echeance')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fnes');
    }
};