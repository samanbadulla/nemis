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
        Schema::create('people_education_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('people_id', 12)->comment('Foreign key referencing pepole list table');
            $table->char('qualifications_id', 10);
            $table->char('institution');
            $table->date('effective_date');
            $table->enum('grade', ['1','2', '3', '4', '5'])->default('5');
            $table->char('description')->nullable();
            $table->boolean('active_status')->default(true)->comment('true: Active, false: Inactive');
            $table->timestamps();

            $table->foreign('people_id')->references('people_id')->on('people')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('qualifications_id')->references('qualifications_id')->on('education_qualifications')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_education_qualifications');
    }
};
