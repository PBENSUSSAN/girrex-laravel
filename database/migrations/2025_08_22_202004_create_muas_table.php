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
        Schema::create('muas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qualification_id')->constrained('qualifications')->restrictOnDelete();
            $table->string('type_flux', 3);
            $table->date('date_debut_cycle');
            $table->date('date_fin_cycle');
            $table->string('statut', 30)->default('ACTIF');
            $table->unsignedSmallInteger('annee_cycle')->default(1);
            $table->date('date_derniere_activite')->nullable();

            // --- Compteurs d'heures ---
            $table->float('heures_cam_effectuees')->default(0.0);
            $table->float('heures_cag_acs_effectuees')->default(0.0);
            $table->float('heures_cag_aps_effectuees')->default(0.0);
            $table->float('heures_tour_effectuees')->default(0.0);
            $table->float('heures_en_cdq')->default(0.0);
            $table->float('heures_en_supervision')->default(0.0);
            $table->float('heures_en_isp')->default(0.0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muas');
    }
};