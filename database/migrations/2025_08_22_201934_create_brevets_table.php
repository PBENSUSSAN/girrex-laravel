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
        Schema::create('brevets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->unique()->constrained('agents', 'id_agent')->cascadeOnDelete();
            $table->string('numero_brevet', 100)->unique();
            $table->date('date_delivrance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brevets');
    }
};