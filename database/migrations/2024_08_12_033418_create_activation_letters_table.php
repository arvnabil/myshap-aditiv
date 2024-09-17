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
        Schema::create('activation_letters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("code")->nullable();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("total_license")->nullable();
            $table->string("code_reference")->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->on('companies')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('zoom_sub_account_id')->references('id')->on('zoom_sub_accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activation_letters');
    }
};
