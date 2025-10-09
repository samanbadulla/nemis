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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->char('service_id', 10)->unique()->comment('e.g., POS001, POS002');
            $table->string('service_name')->unique()->comment('e.g., Teacher, Principal, Admin Officer');
            $table->string('description')->nullable();
            $table->enum('active_status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
