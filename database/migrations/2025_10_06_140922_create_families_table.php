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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->char('family_id', 12)->unique();
            $table->char('member_m_id', 12)->comment('FK → people table');
            $table->char('member_f_id', 12)->comment('FK → people table');
            $table->date('married_date', 12)->comment('Married date');
            $table->string('married_cf_no', 12)->nullable()->comment('marriage certificate number');
            $table->string('married_cf', 12)->nullable()->comment('marriage certificate');
            $table->date('divorce_date', 12)->nullable()->comment('Divorce date');
            $table->string('family_name')->nullable()->comment('Optional family label or household name');
            $table->enum('active_status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();

            $table->foreign('member_m_id')->references('people_id')->on('people')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('member_f_id')->references('people_id')->on('people')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
