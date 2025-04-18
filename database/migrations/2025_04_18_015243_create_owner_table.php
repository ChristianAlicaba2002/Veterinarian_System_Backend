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
        Schema::create('owner', function (Blueprint $table) {
            $table->integer('client_id')->references('client_id')->on('adoption')->onDelete('cascade');
            $table->string('first_name')->references('first_name')->on('adoption')->onDelete('cascade');
            $table->string('last_name')->references('last_name')->on('adoption')->onDelete('cascade');
            $table->string('email')->references('email')->on('adoption')->onDelete('cascade');
            $table->string('phone_number')->references('phone_number')->on('adoption')->onDelete('cascade');
            $table->string('address')->references('address')->on('adoption')->onDelete('cascade');
            $table->integer('pet_id')->references('pet_id')->on('adoption')->onDelete('cascade');
            $table->string('image')->references('image')->on('adoption')->onDelete('cascade');
            $table->string('Pet_Name')->references('Pet_Name')->on('adoption')->onDelete('cascade');
            $table->string('Species')->references('Species')->on('adoption')->onDelete('cascade');
            $table->string('Breed')->references('Breed')->on('adoption')->onDelete('cascade');
            $table->string('Age')->references('Age')->on('adoption')->onDelete('cascade');
            $table->string('Color')->references('Color')->on('adoption')->onDelete('cascade');
            $table->string('Sex')->references('Sex')->on('adoption')->onDelete('cascade');
            $table->string('Microchip_Number')->references('Microchip_Number')->on('adoption')->onDelete('cascade');
            $table->string('Neutered_Spay')->references('Neutered_Spay')->on('adoption')->onDelete('cascade');
            $table->string('Special_Markings')->references('Special_Markings')->on('adoption')->onDelete('cascade');
            $table->string('Weight')->references('Weight')->on('adoption')->onDelete('cascade');
            $table->date('adoption_date')->references('adoption_date')->on('adoption')->onDelete('cascade');
            $table->string('Status')->references('Status')->on('adoption')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner');
    }
};
