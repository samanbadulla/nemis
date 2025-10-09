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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('nic'); // encrypted value
            $table->string('nic_hash', 64)->unique(); // unique + searchable
            $table->char('people_id', 12)->unique()->nullable();
            $table->text('name'); // encrypted value
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('contact', 10)->unique();
            $table->timestamp('contact_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->rememberToken();
            $table->char('active_status', 1)->default('1')->comment('1=Active, 0=Inactive');
            $table->timestamps();

            $table->foreign('nic_hash')->references('nic_hash')->on('people')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('people_id')->references('people_id')->on('people')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
