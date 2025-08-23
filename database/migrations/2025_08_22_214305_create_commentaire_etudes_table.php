<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commentaire_etudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etude_id')->constrained('etude_securites')->cascadeOnDelete();
            $table->foreignId('auteur_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->text('commentaire');
            $table->string('piece_jointe')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commentaire_etudes');
    }
};