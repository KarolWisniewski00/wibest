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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('type'); // wpis, aktualizacja, nowości, regulamin

            // ===== SEO + OPIS =====
            $table->text('short_description')->nullable(); // krótki opis
            $table->string('seo_title')->nullable();       // SEO title
            $table->text('seo_description')->nullable();   // meta description
            $table->text('keywords')->nullable();          // keywords (CSV lub JSON string)

            $table->json('content'); // edytor blokowy

            $table->timestamps();

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->foreignId('created_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
