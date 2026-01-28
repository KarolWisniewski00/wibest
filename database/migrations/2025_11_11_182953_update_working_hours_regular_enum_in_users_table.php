<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1️⃣ Zmieniamy typ kolumny
        Schema::table('users', function (Blueprint $table) {
            // Najpierw usuń starą kolumnę bool (jeśli istnieje)
            if (Schema::hasColumn('users', 'working_hours_regular')) {
                $table->dropColumn('working_hours_regular');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            // 2️⃣ Dodajemy nową kolumnę ENUM z wartościami
            $table->enum('working_hours_regular', [
                'stały planing',
                'prosty planing',
                'zmienny planing',
            ])->nullable()->after('working_hours_custom');
        });

        // 3️⃣ Aktualizacja danych
        DB::table('users')
            ->whereNotNull('working_hours_custom')
            ->update(['working_hours_regular' => 'stały planing']);
    }

    public function down(): void
    {
        // Cofnięcie zmian
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('working_hours_regular');
            $table->boolean('working_hours_regular')->default(false)->after('working_hours_custom');
        });
    }
};

