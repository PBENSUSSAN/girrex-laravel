<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 100)->unique();
            $table->string('intitule', 255);
            $table->foreignId('document_type_id')->constrained('document_types')->restrictOnDelete();
            $table->text('description')->nullable();
            $table->string('fichier_pdf');
            $table->foreignId('responsable_suivi_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->string('statut', 20)->default('EN_REDACTION');
            $table->date('date_mise_en_vigueur')->nullable();
            $table->unsignedInteger('periodicite_relecture_mois')->default(12);
            $table->date('date_prochaine_echeance')->nullable();
            $table->foreignId('remplace_document_id')->nullable()->unique()->constrained('documents')->nullOnDelete();
            $table->foreignId('document_parent_id')->nullable()->constrained('documents')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};