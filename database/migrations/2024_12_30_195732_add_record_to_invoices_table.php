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
        Schema::table('invoices', function (Blueprint $table) {
            $table->date('sale_date')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('paid')->nullable();
            $table->string('paid_part')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('sale_date');
            $table->dropColumn('payment_term');
            $table->dropColumn('paid');
            $table->dropColumn('paid_part');
        });
    }
};
