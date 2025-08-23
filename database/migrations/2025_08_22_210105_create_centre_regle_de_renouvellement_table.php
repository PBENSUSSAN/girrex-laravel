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
        Schema::create('centre_regle_de_renouvellement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
            $table->foreignId('regle_de_renouvellement_id')->constrained('regle_de_renouvellements')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre_regle_de_renouvellement');
    }
};