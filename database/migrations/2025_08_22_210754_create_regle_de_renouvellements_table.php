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
        Schema::create('regle_de_renouvellements', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100)->unique();
            $table->unsignedInteger('seuil_heures_total')->default(90);
            $table->unsignedInteger('seuil_heures_cam')->default(40);
            $table->unsignedInteger('seuil_heures_cag_acs')->default(50);
            $table->unsignedInteger('seuil_heures_cag_aps')->default(0);
            $table->unsignedInteger('seuil_heures_tour')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regle_de_renouvellements');
    }
};