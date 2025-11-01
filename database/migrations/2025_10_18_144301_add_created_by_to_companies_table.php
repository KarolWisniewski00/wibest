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
        Schema::table('companies', function (Blueprint $table) {
            // dodajemy ID użytkownika, który utworzył firmę
            $table->unsignedBigInteger('created_user_id')->nullable();

            // opcjonalnie: klucz obcy do tabeli users
            $table->foreign('created_user_id')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete(); // lub ->cascadeOnDelete() w zależności od logiki
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // najpierw usuń constraint, potem kolumnę
            $table->dropForeign(['created_user_id']);
            $table->dropColumn('created_user_id');
        });
    }
};
