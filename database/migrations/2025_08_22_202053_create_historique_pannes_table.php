<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historique_pannes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panne_id')->constrained('panne_centres')->cascadeOnDelete();
            $table->string('type_evenement', 20);
            $table->foreignId('auteur_user_id')->constrained('users')->restrictOnDelete();
            $table->json('details')->nullable();
            $table->timestamps(); // Gère `timestamp` avec `created_at`
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique_pannes');
    }
};