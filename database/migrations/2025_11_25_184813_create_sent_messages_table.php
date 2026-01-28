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
        Schema::create('sent_messages', function (Blueprint $table) {
            $table->id();
            // Typ wiadomości (np. 'email', 'sms')
            $table->string('type', 10); 

            // Adresat/Numer telefonu
            $table->string('recipient'); 

            // 🔹 Pracownik, którego dotyczy blok pracy
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            
            // 🔹 Firma, do której należy ten blok (jeśli system multi-company)
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();


            // Opcjonalne: Użyteczne dla e-maili
            $table->string('subject')->nullable(); 

            // Treść wiadomości (dla e-mail/sms)
            $table->text('body')->nullable(); 

            // Status wysyłki (np. 'sent', 'failed', 'queued')
            $table->string('status', 20)->nullable();

            $table->float('price')->nullable(); 

            // Automatyczne dodawanie kolumn `created_at` i `updated_at`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_messages');
    }
};
