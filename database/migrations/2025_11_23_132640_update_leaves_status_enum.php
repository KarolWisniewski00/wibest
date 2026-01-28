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
        Schema::table('leaves', function (Blueprint $table) {
            // Definiujemy nowy, rozszerzony zestaw wartości enum
            $table->enum('status', ['oczekujące', 'zaakceptowane', 'odrzucone', 'zablokowane', 'zrealizowane', 'anulowane', 'odblokowane'])->default('oczekujące')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            // W metodzie down przywracamy pierwotny zestaw statusów
            $table->enum('status', ['oczekujące', 'zaakceptowane', 'odrzucone'])->default('oczekujące')->change();
        });
    }
};
