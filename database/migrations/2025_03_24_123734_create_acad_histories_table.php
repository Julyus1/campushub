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
        Schema::create('acad_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('semester');
            $table->string('year');
            $table->foreignIdFor(App\Models\Student::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Section::class)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acad_histories');
    }
};
