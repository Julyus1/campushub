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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('prelims', 5, 2)->default(null);
            $table->decimal('midterm', 5, 2)->default(null);
            $table->decimal('finals', 5, 2)->default(null);
            $table->foreignIdFor(App\Models\AcadHistory::class);
            $table->foreignIdFor(App\Models\Student::class);
            $table->foreignIdFor(App\Models\Subject::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
