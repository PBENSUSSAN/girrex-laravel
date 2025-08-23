<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('cyber_incidents', function (Blueprint $table) {
$table->id();
$table->foreignId('smsi_id')->constrained('smsis')->cascadeOnDelete();
$table->dateTime('date')->useCurrent();
$table->text('description');
$table->string('statut', 20)->default('DETECTION');
$table->foreignId('source_panne_id')->nullable()->constrained('panne_centres')->nullOnDelete();
$table->timestamps();
});
}

public function down(): void
{
Schema::dropIfExists('cyber_incidents');
}
};