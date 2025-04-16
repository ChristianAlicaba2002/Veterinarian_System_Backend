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
        Schema::create('checkup', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id')->references('client_id')->on('clients')->onDelete('cascade');
            $table->string('owner_fullname')->references('first_name','last_name')->on('clients')->onDelete('cascade');
            $table->string('owner_address')->references('address')->on('clients')->onDelete('cascade');
            $table->string('owner_email')->references('email')->on('clients')->onDelete('cascade');
            $table->string('pet_name');
            $table->string('breed');
            $table->string('weight');
            $table->string('species');
            $table->integer('age');
            $table->string('sex');
            $table->date('appointment_date');
            $table->string('checkup_type');
            $table->string('symptoms');
            $table->string('preferred_vet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup');
    }
};
