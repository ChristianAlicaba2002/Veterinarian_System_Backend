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
        Schema::create('grooming', function (Blueprint $table) {
            $table->id('grooming_id');
            $table->integer('client_id')->referefences('client_id')->on('clients')->onDelete('cascade');
            $table->string('first_name')->referefences('first_name')->on('clients')->onDelete('cascade');
            $table->string('last_name')->referefences('last_name')->on('clients')->onDelete('cascade');
            $table->string('address')->referefences('address')->on('clients')->onDelete('cascade');
            $table->string('phone_number')->referefences('phone_number')->on('clients')->onDelete('cascade');
            $table->string('pet_name');
            $table->string('breed');
            $table->string('service_type');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('groomer_name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grooming');
    }
};
