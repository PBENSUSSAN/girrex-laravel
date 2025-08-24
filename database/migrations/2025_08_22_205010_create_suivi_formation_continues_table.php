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
        Schema::create('suivi_formation_continues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevet_id')->constrained('brevets')->cascadeOnDelete();
            $table->string('type_formation', 4);
            $table->date('date_realisation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivi_formation_continues');
    }
};