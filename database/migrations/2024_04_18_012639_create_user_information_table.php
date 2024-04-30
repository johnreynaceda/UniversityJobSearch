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
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('type_of_employee');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('status')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();
            $table->string('proof_path')->nullable();
            $table->string('gsuite')->nullable();
            $table->string('year_of_graduated')->nullable();
            $table->date('date_of_registration')->nullable();
            $table->string('resume_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_information');
    }
};
