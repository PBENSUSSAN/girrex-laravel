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
        Schema::create('licences', function (Blueprint $table) {
            $table->id(); // On utilise une clé standard Laravel
            $table->integer('id_licence')->unique();
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();
            $table->string('num_licence', 50)->nullable();
            $table->string('type_licence', 100)->nullable();
            $table->date('date_delivrance')->nullable();
            $table->date('date_validite')->nullable();
            $table->string('statut', 50)->default('valide');
            $table->date('renouvellement')->nullable();
            $table->date('suspension')->nullable();
            $table->date('retrait')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};