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
        Schema::create('formacoes', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor',8,2);
            $table->unsignedBigInteger('nutriente_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('nutriente_id')->references('id')->on('nutrientes')->cascadeOnDelete();
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes')->cascadeOnDelete();
            $table->unique(['nutriente_id','ingrediente_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacoes');
    }
};
