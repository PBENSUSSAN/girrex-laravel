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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('numero_strip', 50)->nullable();
            $table->foreignId('centre_id')->constrained('centres')->restrictOnDelete();
            $table->string('numero_commande', 100)->nullable();
            $table->date('date_vol');
            $table->time('heure_debut_prevue');
            $table->integer('duree_prevue_secondes')->default(0);
            $table->string('indicatif', 100)->nullable();
            $table->string('flux', 10);
            $table->time('heure_debut_reelle')->nullable();
            $table->time('heure_fin_reelle')->nullable();
            $table->foreignId('parent_vol_id')->nullable()->constrained('vols')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};