<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('piece_jointes', function (Blueprint $table) {
$table->id();
$table->string('fichier');
$table->string('description', 255)->nullable();
$table->foreignId('uploader_user_id')->constrained('users')->restrictOnDelete();
$table->morphs('attachable');
$table->timestamps();
});
}

public function down(): void
{
Schema::dropIfExists('piece_jointes');
}
};