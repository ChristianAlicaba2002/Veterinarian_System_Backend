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
        Schema::create('pets_history', function (Blueprint $table) {
            $table->id('pet_id')->references('pet_id')->on('adoption')->onDelete('cascade');
            $table->string('Pet_Name')->references('Pet_Name')->on('adoption')->onDelete('cascade');
            $table->string('Species')->references('Species')->on('adoption')->onDelete('cascade');
            $table->string('Breed')->references('Breed')->on('adoption')->onDelete('cascade');
            $table->integer('Age')->references('Age')->on('adoption')->onDelete('cascade');
            $table->string('Sex')->references('Sex')->on('adoption')->onDelete('cascade');
            $table->string('Neutered_Spay')->references('Neutered_Spay')->on('adoption')->onDelete('cascade');
            $table->string('Color')->references('Color')->on('adoption')->onDelete('cascade');
            $table->float('Weight')->references('Weight')->on('adoption')->onDelete('cascade');
            $table->string('Special_Markings')->references('Special_Markings')->on('adoption')->onDelete('cascade');
            $table->string('Microchip_Number')->references('Microchip_Number')->on('adoption')->onDelete('cascade');
            $table->string('image')->references('image')->on('adoption')->onDelete('cascade');
            $table->string('Status')->references('Status')->on('adoption')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_history');
    }
};
