<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->text('description');
            $table->string('categorie', 20);
            $table->string('module_concerne', 30);
            $table->foreignId('auteur_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};