<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('centre_recommendation_qs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
            $table->foreignId('recommendation_q_s_id')->constrained('recommendation_qs')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centre_recommendation_qs');
    }
};