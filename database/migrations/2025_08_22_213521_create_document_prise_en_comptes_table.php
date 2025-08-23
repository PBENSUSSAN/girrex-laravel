<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_prise_en_comptes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->timestamp('timestamp')->useCurrent();
            
            $table->unique(['document_id', 'agent_id']);
            // Pas de $table->timestamps() car `timestamp` fait déjà le travail
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_prise_en_comptes');
    }
};