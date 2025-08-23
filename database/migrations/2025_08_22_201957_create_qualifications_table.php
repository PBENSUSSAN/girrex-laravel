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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevet_id')->constrained('brevets')->cascadeOnDelete();
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
            $table->string('type_flux', 10);
            $table->string('type_qualification', 10);
            $table->date('date_obtention');
            $table->string('statut', 20)->default('ACTIF');
            $table->timestamps();

            $table->unique(['brevet_id', 'centre_id', 'type_qualification']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};