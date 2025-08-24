<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('smsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id')->unique()->constrained('centres')->restrictOnDelete();
            $table->foreignId('relais_local_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->foreignId('manuel_management_doc_id')->nullable()->constrained('documents')->nullOnDelete();
            $table->foreignId('programme_surete_doc_id')->nullable()->constrained('documents')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('smsis');
    }
};