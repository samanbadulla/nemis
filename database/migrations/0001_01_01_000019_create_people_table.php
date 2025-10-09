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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('people_id', 12)->unique();
            $table->text('nic'); // encrypted value
            $table->string('nic_hash', 64)->unique(); // unique + searchable
            $table->char('title_id', 3)->comment('Foreign key referencing titles table');
            $table->text('full_name'); // encrypted value
            $table->text('name_with_initials'); // plain text value for searching
            $table->char('gender_id', 3)->comment('Foreign key referencing gender list table');
            $table->date('date_of_birth');
            $table->char('religion_id', 3)->comment('Foreign key referencing religions table');
            $table->char('ethnicity_id', 3)->comment('Foreign key referencing ethnicities table');
            $table->char('civil_status_id', 3)->comment('Foreign key referencing civil_statuses table');
            $table->enum('health_condition', ['0', '1'])->default('1')->comment('1: Normal, 0: Special Needs');
            $table->text('health_problem')->nullable();
            $table->char('blood_group_id', 3)->nullable()->comment('Foreign key referencing blood_groups table');
            $table->string('email')->unique();
            $table->string('phone', 10)->unique();
            $table->char('district_id', 10)->nullable()->comment('District ID where the employer is located');
            $table->char('gn_division_id', 10)->nullable()->comment('Grama Niladhari Division ID');
            $table->text('address_line1');
            $table->text('address_line2');
            $table->text('address_line3')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('latitude', 10)->nullable();
            $table->string('longitude', 10)->nullable();
            $table->string('profile_picture')->nullable();
            $table->enum('active_status', ['0', '1'])->default('1')->comment('1: Active, 0: Inactive');
            $table->timestamps();

            $table->foreign('district_id')->references('district_id')->on('districts_lists')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('gn_division_id')->references('gn_division_id')->on('gn_divisions')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('title_id')->references('title_id')->on('titles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('gender_id')->references('gender_id')->on('gender_lists')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('religion_id')->references('religion_id')->on('religions')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('ethnicity_id')->references('ethnicity_id')->on('ethnicities')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('blood_group_id')->references('blood_group_id')->on('blood_groups')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('civil_status_id')->references('civil_status_id')->on('civil_statuses')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
