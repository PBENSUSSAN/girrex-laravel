<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cyber_risques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smsi_id')->constrained('smsis')->cascadeOnDelete();
            $table->text('description');
            $table->string('gravite', 20)->default('MOYENNE');
            $table->string('probabilite', 20)->default('MOYENNE');
            $table->string('statut', 20)->default('OUVERT');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cyber_risques');
    }
};