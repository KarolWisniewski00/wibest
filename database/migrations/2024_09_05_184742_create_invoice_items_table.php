<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchamia migrację.
     * Tworzy tabelę 'invoice_items', która przechowuje pozycje faktur (produkty lub usługi).
     */
    public function up(): void
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id(); // Auto-increment id
            
            // Powiązanie z fakturą
            $table->unsignedBigInteger('invoice_id'); // ID faktury
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade'); // Powiązanie z tabelą 'invoices', usunięcie faktury usuwa pozycje
            
            // Powiązanie z produktem lub usługą
            $table->unsignedBigInteger('product_id')->nullable(); // ID produktu (może być null)
            $table->unsignedBigInteger('service_id')->nullable(); // ID usługi (może być null)
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null'); // Usunięcie produktu ustawia null
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null'); // Usunięcie usługi ustawia null
           
            // Nazwa produktu lub usługi
            $table->string('name'); // Nazwa produktu lub usługi
            
            // Ilość i cena jednostkowa
            $table->integer('quantity'); // Ilość produktu/usługi
            $table->decimal('unit_price', 15, 2); // Cena jednostkowa netto produktu/usługi
            $table->decimal('subtotal', 15, 2); // Wartość netto (ilość * cena jednostkowa)
            $table->string('vat_rate'); // Stawka VAT w procentach (np. 23.00 dla 23% VAT)
            $table->string('vat_amount'); // Kwota VAT (obliczona jako % od wartości netto)
            $table->decimal('total', 15, 2); // Wartość brutto (wartość netto + VAT)
            
            // Daty utworzenia i modyfikacji rekordu
            $table->timestamps(); // Pola 'created_at' i 'updated_at'
        });
    }

    /**
     * Cofa migrację.
     * Usuwa tabelę 'invoice_items'.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items'); // Usunięcie tabeli 'invoice_items'
    }
};
