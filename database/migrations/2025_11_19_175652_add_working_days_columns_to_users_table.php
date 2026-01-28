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
            $table->boolean('working_mon')->nullable();
            $table->boolean('working_tue')->nullable();
            $table->boolean('working_wed')->nullable();
            $table->boolean('working_thu')->nullable();
            $table->boolean('working_fri')->nullable();
            $table->boolean('working_sat')->nullable();
            $table->boolean('working_sun')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'working_mon',
                'working_tue',
                'working_wed',
                'working_thu',
                'working_fri',
                'working_sat',
                'working_sun'
            ]);
        });
    }
};
