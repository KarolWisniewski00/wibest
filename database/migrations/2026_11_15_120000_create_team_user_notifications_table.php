<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_user_notifications', function (Blueprint $table) {
            // Keep the delivery claim even if the user is subsequently deleted.
            $table->unsignedBigInteger('user_id')->primary();
            $table->timestamp('started_at');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('failed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_user_notifications');
    }
};
