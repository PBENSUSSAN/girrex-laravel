<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mrrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etude_id')->constrained('etude_securites')->cascadeOnDelete();
            $table->text('description');
            $table->foreignId('auteur_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mrrs');
    }
};