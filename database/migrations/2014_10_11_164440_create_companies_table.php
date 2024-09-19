<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchamia migrację.
     * Tworzy tabelę 'companies' z polami dla danych firmy.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Automatycznie inkrementowane ID
            $table->string('name'); // Nazwa firmy
            $table->string('adress');
            $table->string('bank')->nullable();
            $table->string('vat_number')->unique(); // Unikalny numer VAT firmy
            $table->timestamps(); // Pola 'created_at' i 'updated_at'
        });
    }

    /**
     * Cofa migrację.
     * Usuwa tabelę 'companies' z bazy danych.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies'); // Usunięcie tabeli 'companies'
    }
};
