<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->integer('id_module')->primary();
            $table->string('module_type', 100)->nullable();
            $table->string('module', 255)->nullable();
            $table->string('item', 255)->nullable();
            $table->string('numero', 50)->nullable();
            $table->text('sujet')->nullable();
            $table->date('date')->nullable();
            $table->date('validite')->nullable();
            $table->string('support', 50)->nullable();
            $table->text('precisions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};