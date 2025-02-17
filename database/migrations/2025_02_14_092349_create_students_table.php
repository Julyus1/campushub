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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('stud_id')->unique();
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->string('year_level');
            $table->string('stud_class');
            $table->string('department');
            $table->string('course');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('gender')->in(['Male', 'Female']);
            $table->date('birthdate');
            $table->string('contact')->nullable();
            $table->string('religion')->nullable();
            $table->string('origin')->nullable();
            $table->string('nationality');
            $table->string('civilstatus')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('stname')->nullable();
            $table->string('brgy')->nullable();
            $table->string('city');
            $table->string('province');
            $table->integer('postalcode')->nullable();
            $table->string('homenumber')->nullable();
            $table->string('mobilenumber');
            $table->string('emergencyperson');
            $table->string('relationship');
            $table->string('emergencycontact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
