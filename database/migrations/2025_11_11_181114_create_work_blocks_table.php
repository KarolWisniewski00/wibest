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
        Schema::create('work_blocks', function (Blueprint $table) {
            $table->id();

            // 🔹 Pracownik, którego dotyczy blok pracy
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // 🔹 Czas rozpoczęcia i zakończenia bloku
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');

            // 🔹 Typ bloku (np. praca dzienna, nocna, dyżur, przerwa)
            $table->string('type')
                ->default('work');

            // 🔹 Łączny czas trwania w sekundach (opcjonalnie, do raportów)
            $table->integer('duration_seconds')
                ->nullable();

            // 🔹 Powiązanie z sesją pracy / zadaniem (np. z work_sessions)
            $table->foreignId('work_session_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // 🔹 Użytkownik, który utworzył ten wpis (np. menedżer)
            $table->foreignId('created_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // 🔹 Firma, do której należy ten blok (jeśli system multi-company)
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();

            // 🔹 Daty utworzenia i aktualizacji
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_blocks');
    }
};
