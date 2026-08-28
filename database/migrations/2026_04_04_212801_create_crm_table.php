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
        Schema::create('crm', function (Blueprint $table) {
            $table->id();
            // 🔹 Pracownik, którego dotyczy
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // 🔹 Firma
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();

            $table->foreignId('created_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('type')->nullable();
            $table->string('datetime_complete')->nullable();
            $table->boolean('important')->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('datetime_start')->nullable();
            $table->dateTime('datetime_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm');
    }
};
