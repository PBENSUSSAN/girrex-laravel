<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etude_securites', function (Blueprint $table) {
            $table->id();
            $table->string('reference_etude', 50)->unique();
            $table->foreignId('changement_id')->unique()->constrained('changements')->cascadeOnDelete();
            $table->string('type_etude', 20)->default('DOSSIER_SECURITE');
            $table->string('plan_securite_pdf')->nullable();
            $table->string('fichier_approbation_finale')->nullable();
            $table->string('statut', 30)->default('INITIALISATION');
            $table->integer('avancement')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etude_securites');
    }
};