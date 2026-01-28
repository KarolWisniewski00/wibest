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
            $table->boolean('overtime')->nullable()->default(true);
            $table->integer('overtime_threshold')->nullable()->default(0);
            $table->boolean('overtime_task')->nullable()->default(false);
            $table->boolean('overtime_accept')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'overtime',
                'overtime_threshold',
                'overtime_task',
                'overtime_accept',
            ]);
        });
    }
};
