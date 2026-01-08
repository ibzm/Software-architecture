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
    Schema::create('complaints', function (Blueprint $table) {
        $table->uuid('complaint_id')->primary();
        $table->uuid('organisation_id');
        $table->string('reference_no')->unique();
        $table->string('category');
        $table->text('description');
        $table->string('status')->default('New');
        $table->uuid('assigned_to_user_id')->nullable();
        $table->timestamps();

        $table->foreign('organisation_id')
            ->references('organisation_id')
            ->on('organisations')
            ->cascadeOnDelete();

        $table->foreign('assigned_to_user_id')
            ->references('id')
            ->on('users')
            ->nullOnDelete();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
