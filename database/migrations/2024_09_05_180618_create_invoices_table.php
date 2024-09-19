<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchamia migrację.
     * Tworzy tabelę 'invoices' dla faktur.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Auto-increment id
            $table->string('number')->unique(); // Unikalny numer faktury
            $table->enum('invoice_type', ['faktura', 'faktura proforma']); // Typ faktury
            $table->unsignedBigInteger('company_id'); // ID firmy wystawiającej fakturę
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Klucz obcy - firma
            $table->date('issue_date'); // Data wystawienia faktury
            $table->date('due_date'); // Termin płatności faktury
            $table->enum('status', ['robocza', 'wysłana', 'opłacona', 'anulowana'])->default('robocza'); // Status faktury
            
            // Powiązanie z klientem
            $table->unsignedBigInteger('client_id')->nullable(); // ID klienta, może być null
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null'); // Klucz obcy - klient, usunięcie klienta ustawia null
           
            // Kwoty
            $table->decimal('subtotal', 15, 2); // Kwota netto
            $table->string('vat'); // Kwota VAT
            $table->decimal('total', 15, 2); // Kwota brutto
           
            // Dane sprzedawcy (firmy)
            $table->string('seller_name'); // Nazwa sprzedawcy (firma wystawiająca)
            $table->string('seller_adress'); // Adres sprzedawcy
            $table->string('seller_tax_id'); // NIP sprzedawcy
            $table->string('seller_bank');
           
            // Dane klienta (nabywcy)
            $table->string('buyer_name'); // Nazwa nabywcy (klient)
            $table->string('buyer_adress'); // Adres nabywcy
            $table->string('buyer_tax_id'); // NIP nabywcy
        
            // Inne informacje
            $table->text('notes')->nullable(); // Uwagi dotyczące faktury (opcjonalne)
            $table->string('payment_method')->nullable(); // Metoda płatności (np. przelew, gotówka)
            
            $table->timestamps(); // Daty utworzenia i modyfikacji rekordu (created_at, updated_at)
        });
    }

    /**
     * Cofa migrację.
     * Usuwa tabelę 'invoices'.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices'); // Usunięcie tabeli 'invoices'
    }
};
