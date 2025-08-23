<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('agent_recommendation_qs', function (Blueprint $table) {
$table->id();
$table->foreignId('agent_id')->constrained('agents', 'id_agent')->cascadeOnDelete();
$table->foreignId('recommendation_q_s_id')->constrained('recommendation_qs')->cascadeOnDelete();
});
}

public function down(): void
{
Schema::dropIfExists('agent_recommendation_qs');
}
};