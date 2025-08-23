<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etape_etudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etude_id')->constrained('etude_securites')->cascadeOnDelete();
            $table->string('nom', 10);
            $table->string('document_preuve')->nullable();
            $table->text('mrr_identifies')->nullable();
            $table->boolean('validee_par_local')->default(false);
            $table->dateTime('date_validation_local')->nullable();
            $table->boolean('validee_par_national')->default(false);
            $table->dateTime('date_validation_national')->nullable();
            $table->timestamps();

            $table->unique(['etude_id', 'nom']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etape_etudes');
    }
};