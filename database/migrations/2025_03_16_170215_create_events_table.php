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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->string('location');
            $table->string('device');
            $table->enum('event_type', ['start', 'stop']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreign('company_id')->nullable()->references('id')->on('companies')->onDelete('set null');
            $table->foreign('created_user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
