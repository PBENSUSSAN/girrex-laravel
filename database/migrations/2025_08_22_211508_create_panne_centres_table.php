<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('panne_centres', function (Blueprint $table) {
            $table->id();
            $table->string('type_equipement', 30)->default('AUTRE');
            $table->string('equipement_details', 255)->nullable();
            $table->dateTime('date_heure_debut')->index();
            $table->dateTime('date_heure_fin')->nullable();
            $table->string('criticite', 20)->default('MINEURE');
            $table->text('description');
            $table->string('statut', 20)->default('EN_COURS');
            $table->foreignId('centre_id')->constrained('centres')->restrictOnDelete();
            $table->foreignId('auteur_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->boolean('notification_generale')->default(false);
            $table->timestamps(); // Gère `cree_le` avec `created_at`
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panne_centres');
    }
};