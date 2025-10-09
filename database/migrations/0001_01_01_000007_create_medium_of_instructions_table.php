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
        Schema::create('medium_of_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('medium_id', 10)->unique();
            $table->string('name', 100);
            $table->char('active_status', 1)->default('1')->comment('1=Active, 0=Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medium_of_instructions');
    }
};
