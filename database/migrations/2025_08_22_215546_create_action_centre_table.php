<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('action_centre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_suivi_id')->constrained('action_suivis')->cascadeOnDelete();
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_centre');
    }
};