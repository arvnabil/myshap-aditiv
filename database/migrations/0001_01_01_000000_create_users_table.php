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
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('email_token', 191)->nullable();
            $table->string('verification_code', 6)->nullable();
            $table->boolean('is_locked')->default(0);
            $table->boolean('is_active')->default(1);
            $table->dateTime('last_password_change')->nullable();
            $table->string('leave_type')->default(1);
            $table->string('google_calendar_id')->nullable();
            $table->text('google_calendar_access_token')->nullable();
            $table->text('google_calendar_refresh_token')->nullable();
            $table->text('google_calendar_token_type')->nullable();
            $table->dateTime('google_calendar_access_token_expired_at')->nullable();
            $table->text('google_calendar_user_account_info')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
