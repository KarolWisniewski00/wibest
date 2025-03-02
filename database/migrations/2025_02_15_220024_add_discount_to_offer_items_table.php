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
        Schema::table('offer_items', function (Blueprint $table) {
            $table->string('discount')->nullable();
            $table->string('price_after_discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offer_items', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('price_after_discount');
        });
    }
};
