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
        Schema::create('formulacoes', function (Blueprint $table) {
            $table->id();
            $table->string('objetivo');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('racao_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('racao_id')->references('id')->on('racoes')->cascadeOnDelete();
            $table->unique(['racao_id','user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulacoes');
    }
};
