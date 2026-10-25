<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();

            // Firma / zespół WIBEST
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();

            // Nazwa obiektu
            $table->string('name');

            // Istniejąca lokalizacja
            $table->foreignId('location_id')
                ->constrained('locations')
                ->restrictOnDelete();

            // Maksymalna odległość od lokalizacji w metrach
            $table->unsignedInteger('allowed_distance')
                ->default(100);

            // active / paused / completed
            $table->string('status')
                ->default('active');

            // Dodatkowe informacje
            $table->text('description')
                ->nullable();

            // Planowany okres realizacji
            $table->date('starts_at')
                ->nullable();

            $table->date('ends_at')
                ->nullable();

            $table->timestamps();

            $table->index(['company_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objects');
    }
};