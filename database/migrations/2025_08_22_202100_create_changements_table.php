<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('changements', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->text('description');
            $table->foreignId('initiateur_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->foreignId('centre_principal_id')->constrained('centres')->restrictOnDelete();
            $table->string('fichier_notification_initiale');
            $table->string('fichier_reponse_notification')->nullable();
            $table->string('classification', 20)->default('NON_DEFINI');
            $table->foreignId('correspondant_dircam_agent_id')->constrained('agents', 'id_agent')->restrictOnDelete();
            $table->string('statut', 20)->default('NOTIFICATION');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('changements');
    }
};