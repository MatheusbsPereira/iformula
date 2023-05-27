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
            $table->decimal('valornut',8,2);
            $table->unsignedBigInteger('nutriente_id');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('nutriente_id')->references('id')->on('nutrientes');
            $table->foreign('animal_id')->references('id')->on('animais');
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
