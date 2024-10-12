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
            $table->unsignedBigInteger('invoice_id')->nullable()->after('id'); // Klucz obcy, nullable (bo faktury sprzedażowe mogą być tworzone bez proformy)
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('set null'); // Ustawienie relacji z samą tabelą
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']); // Usunięcie klucza obcego
            $table->dropColumn('invoice_id');    // Usunięcie kolumny
        });
    }
};
