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
        // Indeks na tabeli events dla szybkiego filtrowania i sortowania po czasie
        Schema::table('events', function (Blueprint $table) {
            $table->index('time');
        });

        // Indeksy na work_sessions dla filtracji po userze, firmie i powiązaniu z events
        Schema::table('work_sessions', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('company_id');
            $table->index('event_start_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Usuwanie indeksów musi odbywać się w odwrotnej kolejności 
        // lub poprzez podanie nazw indeksów (zwykle Laravel nadaje je automatycznie: tabela_kolumna_index)

        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex(['time']);
        });

        Schema::table('work_sessions', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
            $table->dropIndex(['company_id']);
            $table->dropIndex(['event_start_id']);
        });
    }
};
