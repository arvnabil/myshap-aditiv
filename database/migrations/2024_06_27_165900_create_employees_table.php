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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100)->nullable();
            $table->string('account_number', 50)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('dateofbirth')->nullable();
            $table->date('dateofjoining')->nullable();
            $table->date('dateofleaving')->nullable();
            $table->string('blood_group', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('matrial_status',125)->default('Single');
            $table->string('pincode', 50)->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->on('positions')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->on('countries')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
