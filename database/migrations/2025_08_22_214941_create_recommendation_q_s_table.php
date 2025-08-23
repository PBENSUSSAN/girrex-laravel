<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendation_qs', function (Blueprint $table) {
            $table->id();
            $table->morphs('source');
            $table->text('description');
            $table->string('priorite', 50);
            $table->string('statut', 50)->default('PROPOSEE');
            $table->date('date_emission')->useCurrent();
            $table->date('date_echeance');
            $table->foreignId('responsable_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->text('destinataires_externes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendation_qs');
    }
};