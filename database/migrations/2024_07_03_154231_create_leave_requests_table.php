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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->string('year')->nullable();
            $table->integer('total_leave')->default(0);
            $table->string('attachment')->nullable();
            $table->string('is_imported')->default(0);
            $table->date('approved_at')->nullable();
            $table->unsignedBigInteger('leave_type_id')->nullable();
            $table->foreign('leave_type_id')->on('leave_types')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->foreign('checked_by')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
