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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->string('number'); // Unikalny numer faktury (nie nullable)
            $table->string('invoice_type')->nullable(); // Typ faktury
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null'); // ID firmy
            $table->date('issue_date')->nullable(); // Data wystawienia
            $table->date('due_date'); // Termin płatności (nie nullable)
            $table->string('status')->nullable(); // Status faktury
            $table->decimal('subtotal', 10, 2)->nullable(); // Kwota netto
            $table->decimal('vat', 10, 2)->nullable(); // VAT
            $table->decimal('total', 10, 2); // Kwota brutto (nie nullable)
            $table->string('seller_name')->nullable(); // Nazwa sprzedawcy
            $table->string('seller_address')->nullable(); // Adres sprzedawcy
            $table->string('seller_tax_id')->nullable(); // NIP sprzedawcy
            $table->string('buyer_name')->nullable(); // Nazwa nabywcy
            $table->string('buyer_address')->nullable(); // Adres nabywcy
            $table->string('buyer_tax_id')->nullable(); // NIP nabywcy
            $table->text('notes')->nullable(); // Dodatkowe uwagi
            $table->string('payment_method')->nullable(); // Metoda płatności
            $table->string('total_in_words')->nullable(); // Kwota słownie
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Użytkownik
            $table->string('path')->nullable(); // Ścieżka do pliku lub dokumentu
            $table->timestamps(); // Daty utworzenia i aktualizacji
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};
