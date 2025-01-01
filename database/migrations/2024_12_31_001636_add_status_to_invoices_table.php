<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('robocza', 'wysłana', 'opłacona', 'anulowana','wystawiona', 'szkic', 'opłacona częściowo') NOT NULL;");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            DB::statement("ALTER TABLE invoices MODIFY COLUMN invoice_type ENUM('robocza', 'wysłana', 'opłacona', 'anulowana','wystawiona', 'szkic', 'opłacona częściowo') NOT NULL;");
        });
    }
};
