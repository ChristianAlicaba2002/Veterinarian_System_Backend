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
        Schema::create('pets', function (Blueprint $table) {
            $table->id('pet_id');
            $table->string('Pet_Name');
            $table->string('Species');
            $table->string('Breed');
            $table->integer('Age');
            $table->string('Sex');
            $table->string('Neutered_Spay');
            $table->string('Color');
            $table->float('Weight');
            $table->string('Special_Markings')->nullable();
            $table->string('Microchip_Number')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
