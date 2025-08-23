<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('historique_fnes', function (Blueprint $table) {
$table->id();
$table->foreignId('fne_id')->constrained('fnes')->cascadeOnDelete();
$table->timestamp('timestamp')->useCurrent();
$table->foreignId('auteur_user_id')->constrained('users')->restrictOnDelete();
$table->string('type_evenement', 40);
$table->json('details')->nullable();
});
}

public function down(): void
{
Schema::dropIfExists('historique_fnes');
}
};