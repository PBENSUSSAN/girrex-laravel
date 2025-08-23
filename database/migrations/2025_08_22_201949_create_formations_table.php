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
            $table->foreignId('agent_id')->nullable()->constrained('agents')->cascadeOnDelete();
            $table->foreignId('module_id')->nullable()->constrained('modules')->nullOnDelete();
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