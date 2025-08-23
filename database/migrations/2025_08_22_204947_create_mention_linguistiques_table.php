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
        Schema::create('mention_linguistiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevet_id')->constrained('brevets')->cascadeOnDelete();
            $table->string('langue', 20);
            $table->integer('niveau_oaci');
            $table->date('date_evaluation');
            $table->date('date_echeance');
            $table->timestamps();

            $table->unique(['brevet_id', 'langue']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mention_linguistiques');
    }
};