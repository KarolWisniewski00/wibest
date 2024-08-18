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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Auto-increment id
            $table->string('title'); // Tytuł wydarzenia
            $table->text('description')->nullable();
            $table->dateTime('start'); // Data i godzina rozpoczęcia
            $table->dateTime('end')->nullable(); // Data i godzina zakończenia
            $table->string('color')->nullable(); // Kolor
            $table->unsignedBigInteger('user_id')->nullable(); // ID użytkownika
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Klucz obcy do tabeli users
            $table->timestamps(); // Timestampy created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
