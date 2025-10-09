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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->char('family_id', 12)->comment('FK → families.family_id');
            $table->string('child_name')->comment('Children name');
            $table->date('date_of_birth')->comment('Children birth day');
            $table->string('birth_fc_no', 12)->comment('Children birth certificate number');
            $table->enum('health_condition', ['0', '1'])->default('1')->comment('1: Normal, 0: Special Needs');
            $table->enum('active_status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();

            $table->foreign('family_id')->references('family_id')->on('families')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
