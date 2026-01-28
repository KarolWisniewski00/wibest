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
        Schema::table('leaves', function (Blueprint $table) {
            $table->boolean('is_used')->default(false)->after('status'); // Przykład umieszczenia po kolumnie 'status'
            $table->integer('days')->nullable();
            $table->integer('working_days')->nullable();
            $table->integer('non_working_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn(['is_used', 'days', 'working_days', 'non_working_days']);
        });
    }
};
