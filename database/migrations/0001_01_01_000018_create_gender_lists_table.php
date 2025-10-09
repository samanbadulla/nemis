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
        Schema::create('gender_lists', function (Blueprint $table) {
            $table->id();
            $table->char('gender_id', 10)->unique()->comment('GEN001, GEN002, GEN003');
            $table->string('gender_name');
            $table->enum('active_status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gender_lists');
    }
};
