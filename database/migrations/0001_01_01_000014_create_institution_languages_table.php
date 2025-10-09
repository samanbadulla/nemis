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
        Schema::create('institution_languages', function (Blueprint $table) {
            $table->id();
            $table->char('language_id',10)->unique();
            $table->string('name',100);
            $table->enum('active_status', ['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_languages');
    }
};
