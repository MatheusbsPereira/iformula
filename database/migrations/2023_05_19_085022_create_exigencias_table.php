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
        Schema::create('exigencias', function (Blueprint $table) {
            $table->id();
            $table->decimal('valormin',8,2);
            $table->decimal('valormax',8,2);
            $table->unsignedBigInteger('nutriente_id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('nutriente_id')->references('id')->on('nutrientes')->cascadeOnDelete();
            $table->foreign('animal_id')->references('id')->on('animais')->cascadeOnDelete();
            $table->unique(['nutriente_id','animal_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exigencias');
    }
};
