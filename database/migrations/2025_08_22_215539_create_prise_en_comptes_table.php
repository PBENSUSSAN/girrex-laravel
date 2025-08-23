<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prise_en_comptes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_agent_id')->unique()->constrained('action_suivis')->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->timestamp('timestamp')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prise_en_comptes');
    }
};