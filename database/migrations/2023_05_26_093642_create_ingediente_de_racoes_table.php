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
        Schema::create('ingediente_de_racoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nutriente_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->unsignedBigInteger('racao_id');
            $table->foreign('nutriente_id')->references('id')->on('nutrientes');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            $table->foreign('racao_id')->references('id')->on('racoes');
            $table->unique(['nutriente_id','ingrediente_id','racao_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingediente_de_racoes');
    }
};
