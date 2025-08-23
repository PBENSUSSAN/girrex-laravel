<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('miso_id')->constrained('misos')->cascadeOnDelete();
            $table->string('type_evenement', 20);
            $table->foreignId('auteur_user_id')->constrained('users')->restrictOnDelete();
            $table->json('details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};