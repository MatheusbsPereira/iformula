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
        Schema::create('ingredientes_de_formulacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingrediente_id');
            $table->unsignedBigInteger('formulacao_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('formulacao_id')->references('id')->on('formulacoes')->cascadeOnDelete();
            $table->unique(['ingrediente_id','formulacao_id'])->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes_de_formulacoes');
    }
};
