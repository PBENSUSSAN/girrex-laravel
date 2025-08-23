<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('misos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsable_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->foreignId('centre_id')->constrained('centres')->restrictOnDelete();
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->string('type_maintenance', 20);
            $table->text('description');
            $table->string('piece_jointe')->nullable();
            $table->string('statut_override', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('misos');
    }
};