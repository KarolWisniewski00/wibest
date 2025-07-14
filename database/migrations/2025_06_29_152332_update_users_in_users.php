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
        Schema::table('users', function (Blueprint $table) {
            $table->string('working_hours_start_day')->nullable()->after('working_hours_to');
            $table->string('working_hours_stop_day')->nullable()->after('working_hours_start_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'working_hours_start_day',
                'working_hours_stop_day',
            ]);
        });
    }
};
