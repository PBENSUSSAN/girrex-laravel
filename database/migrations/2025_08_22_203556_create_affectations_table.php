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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            // --- CORRECTION ICI ---
            // On spécifie que la clé étrangère pointe vers la colonne 'id_agent'
            $table->foreignId('agent_id')->constrained('agents', 'id_agent')->cascadeOnDelete();
            
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
            $table->string('fonction', 255);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};