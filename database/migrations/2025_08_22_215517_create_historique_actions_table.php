<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historique_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id')->constrained('action_suivis')->cascadeOnDelete();
            $table->string('type_evenement', 30);
            $table->foreignId('auteur_user_id')->constrained('users')->restrictOnDelete();
            $table->json('details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique_actions');
    }
};