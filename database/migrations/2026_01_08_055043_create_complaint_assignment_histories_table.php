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
    Schema::create('complaint_assignment_histories', function (Blueprint $table) {
        $table->uuid('assignment_id')->primary();
        $table->uuid('organisation_id');
        $table->uuid('complaint_id');
        $table->uuid('assigned_to_user_id');
        $table->uuid('assigned_by_user_id');
        $table->timestamp('assigned_at');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('organisation_id')
            ->references('organisation_id')
            ->on('organisations')
            ->cascadeOnDelete();

        $table->foreign('complaint_id')
            ->references('complaint_id')
            ->on('complaints')
            ->cascadeOnDelete();

        $table->foreign('assigned_to_user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

        $table->foreign('assigned_by_user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_assignment_histories');
    }
};
