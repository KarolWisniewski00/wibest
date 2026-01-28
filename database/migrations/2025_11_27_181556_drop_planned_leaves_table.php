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
        Schema::table('planned_leaves', function (Blueprint $table) {
            Schema::dropIfExists('planned_leaves');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planned_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreign('company_id')->nullable()->references('id')->on('companies')->onDelete('set null');
            $table->foreign('created_user_id')->nullable()->references('id')->on('users')->onDelete('set null');
        });
    }
};
