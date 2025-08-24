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
        Schema::create('formations', function (Blueprint $table) {
            $table->integer('id_formation')->primary();
            $table->foreignId('agent_id')->nullable()->constrained('agents', 'id_agent')->cascadeOnDelete();

            // --- CORRECTION ICI ---
            // On déclare la colonne comme un simple integer (pas un foreignId)
            $table->integer('module_id')->nullable();
            // On déclare la contrainte manuellement
            $table->foreign('module_id')->references('id_module')->on('modules')->nullOnDelete();

            $table->foreignId('organisme_id')->nullable()->constrained('organismes')->nullOnDelete();
            $table->date('date')->nullable();
            $table->integer('annee')->nullable();
            $table->string('duree', 20)->nullable();
            $table->string('resultat', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};