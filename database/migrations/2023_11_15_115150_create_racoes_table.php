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
        Schema::create('racoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50);
            $table->string('tag',10);
            $table->unsignedInteger('idade');
            $table->unsignedDecimal('peso',8,2);
            $table->string('descricao',70)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fabrica_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('fabrica_id')->references('id')->on('fabricas')->cascadeOnDelete();
            $table->unique(['nome','fabrica_id']);
            $table->index('tag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racoes');
    }
};
