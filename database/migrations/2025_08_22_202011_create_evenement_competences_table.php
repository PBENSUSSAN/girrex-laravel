<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenement_competences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->string('type_evenement', 30);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->text('details');
            $table->foreignId('cree_par_user_id')->constrained('users')->restrictOnDelete();
            $table->timestamps(); // Gère cree_le (created_at) et un champ de mise à jour (updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenement_competences');
    }
};