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
        Schema::create('teacher_categories', function (Blueprint $table) {
            $table->id();
            $table->char('categories_id', 10)->unique();
            $table->string('name', 100);
            $table->string('description', 255);
            $table->enum('active_status', ['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_categories');
    }
};
