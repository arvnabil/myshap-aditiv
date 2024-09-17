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
        Schema::create('overtime_items', function (Blueprint $table) {
            $table->id();
            $table->string('time_in');
            $table->string('time_out');
            $table->string('activity_name');
            $table->date('overtime_date');
            $table->text('reason')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('status');
            $table->foreignUuid('overtime_id')->references('id')->on('overtime_requests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_items');
    }
};
