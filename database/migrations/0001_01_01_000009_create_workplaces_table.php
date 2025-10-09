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
        Schema::create('workplaces', function (Blueprint $table) {
            $table->id();
            $table->char('workplace_id', 10)->unique(); // Unique code for the workplace
            $table->char('office_level_id', 10); // Code of the education office/school level
            $table->char('parent_workplace_id', 10)->nullable(); // Code of the parent workplace
            $table->timestamps();

            $table->foreign('office_level_id')->references('office_level_id')->on('office_levels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workplaces');
    }
};
