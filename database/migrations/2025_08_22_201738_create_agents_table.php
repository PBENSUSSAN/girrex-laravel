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
        Schema::create('agents', function (Blueprint $table) {
            $table->integer('id_agent')->primary();
            $table->foreignId('centre_id')->nullable()->constrained('centres')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->cascadeOnDelete();
            $table->string('reference', 50)->nullable();
            $table->string('trigram', 10)->nullable()->unique();
            $table->string('nom', 100)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('nationalite', 100)->nullable();
            $table->boolean('actif')->default(true);
            $table->string('type_agent', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};