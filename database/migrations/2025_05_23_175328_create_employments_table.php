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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->date('birth_date')->nullable();
            $table->string('nationality');
            $table->string('identity_number');
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['single', 'married']);
            $table->string('educational_level');
            $table->string('specialization');
            $table->string('field');
            $table->string('section_id'); // Assuming section_id is a string to match form options
            $table->string('cv')->nullable(); // For file path, nullable if not uploaded
            $table->unsignedInteger('building_number')->nullable();
            $table->unsignedInteger('additional_number')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->unsignedInteger('postal_code')->nullable();
            $table->text('skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
