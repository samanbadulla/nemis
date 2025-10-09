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
        Schema::create('institution_categories', function (Blueprint $table) {
            $table->id();
            $table->char('institution_category_id', 10)->unique()->comment('example. ITID01, ITID02');
            $table->string('institution_category_name', 150)->unique()->comment('school, college, university, etc.');
            $table->string('description')->nullable();
            $table->enum('active_status', ['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_categories');
    }
};
