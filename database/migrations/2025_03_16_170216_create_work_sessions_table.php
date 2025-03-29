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
        Schema::create('work_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('event_start_id')->nullable();
            $table->unsignedBigInteger('event_stop_id')->nullable();
           
            $table->string('time_in_work')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreign('company_id')->nullable()->references('id')->on('companies')->onDelete('set null');
            $table->foreign('created_user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreign('event_start_id')->nullable()->references('id')->on('events')->onDelete('set null');
            $table->foreign('event_stop_id')->nullable()->references('id')->on('events')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_sessions');
    }
};
