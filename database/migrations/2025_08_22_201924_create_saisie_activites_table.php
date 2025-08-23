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
        Schema::create('saisie_activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vol_id')->constrained('vols')->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->string('role', 20);
            $table->unique(['vol_id', 'agent_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saisie_activites');
    }
};