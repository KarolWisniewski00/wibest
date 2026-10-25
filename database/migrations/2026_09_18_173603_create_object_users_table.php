<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('object_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('object_id')
                ->constrained('objects')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['object_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('object_user');
    }
};