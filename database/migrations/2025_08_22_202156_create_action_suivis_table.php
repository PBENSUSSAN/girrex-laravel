<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('action_suivis', function (Blueprint $table) {
            $table->id();
            $table->string('numero_action', 50)->nullable()->unique();
            $table->string('titre', 255);
            $table->text('description')->nullable();
            $table->string('categorie', 30)->default('FONCTIONNEMENT');
            $table->foreignId('responsable_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->date('echeance');
            $table->string('priorite', 20)->default('MOYENNE');
            $table->string('statut', 20)->default('A_FAIRE');
            $table->integer('avancement')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('action_suivis')->cascadeOnDelete();
            $table->nullableMorphs('objet_source');
            $table->date('echeance_proposee')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_suivis');
    }
};