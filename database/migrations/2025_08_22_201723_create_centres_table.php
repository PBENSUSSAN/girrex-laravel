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
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('nom_centre')->unique();
            $table->string('code_centre', 10)->unique();
            $table->boolean('gere_aps')->default(false);
            $table->boolean('gere_tour')->default(false);
            $table->unsignedInteger('nombre_cabines')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centres');
    }
};