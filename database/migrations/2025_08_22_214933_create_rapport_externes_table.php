<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapport_externes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fne_id')->constrained('fnes')->cascadeOnDelete();
            $table->string('organisme_source', 255);
            $table->string('reference_externe', 255)->nullable();
            $table->text('description');
            $table->string('fichier_joint')->nullable();
            $table->date('date_reception');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapport_externes');
    }
};