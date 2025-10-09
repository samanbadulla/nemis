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
        Schema::create('subject_lists', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id',10)->unique();
            $table->string('subject_code',10)->nullable();
            $table->string('name_en');
            $table->string('name_si')->nullable();
            $table->string('name_ta')->nullable();
            $table->enum('status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_lists');
    }
};
