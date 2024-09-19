<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchamia migrację.
     * Tworzy tabelę 'clients' dla klientów (firm lub osób prywatnych).
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Auto-increment id (unikalne ID klienta)
            $table->string('name'); // Nazwa klienta (może to być firma lub osoba prywatna)
            
            // Kontakty
            $table->string('email')->nullable(); // Główny adres email klienta, może być null
            $table->string('email2')->nullable(); // Dodatkowy adres email, może być null
            $table->string('phone')->nullable(); // Główny numer telefonu, może być null
            $table->string('phone2')->nullable(); // Dodatkowy numer telefonu, może być null
            
            // Informacje podatkowe
            $table->string('vat_number')->unique(); // Unikalny numer VAT klienta (może być wymagany dla firm)
            $table->string('adress');
            
            // Dodatkowe informacje
            $table->text('notes')->nullable(); // Dodatkowe uwagi o kliencie, może być null

            // Daty utworzenia i ostatniej modyfikacji rekordu
            $table->timestamps(); // Pola 'created_at' i 'updated_at'
        });
    }

    /**
     * Cofa migrację.
     * Usuwa tabelę 'clients'.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients'); // Usunięcie tabeli 'clients' z bazy danych
    }
};
