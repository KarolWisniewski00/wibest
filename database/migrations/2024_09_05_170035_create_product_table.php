<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchamia migrację.
     * Tworzy tabelę 'products' dla produktów oferowanych przez firmę.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Unikalne ID produktu
            $table->string('name'); // Nazwa produktu

            // Ceny i wartości
            $table->decimal('unit_price', 15, 2)->nullable(); // Cena jednostkowa netto produktu (może być null)
            $table->decimal('subtotal', 15, 2)->nullable(); // Wartość netto (ilość * cena jednostkowa)
            $table->decimal('vat_rate', 5, 2)->nullable(); // Stawka VAT w procentach (np. 23.00 dla 23% VAT)
            $table->decimal('vat_amount', 15, 2)->nullable(); // Kwota VAT (obliczona jako % od wartości netto)
            $table->decimal('total', 15, 2)->nullable(); // Wartość brutto (wartość netto + VAT)

            // Dodatkowe informacje o produkcie
            $table->text('description')->nullable(); // Opis produktu (może być null)

            // Daty utworzenia i ostatniej modyfikacji rekordu
            $table->timestamps(); // Pola 'created_at' i 'updated_at'
        });
    }

    /**
     * Cofa migrację.
     * Usuwa tabelę 'products'.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Usunięcie tabeli 'products'
    }
};
