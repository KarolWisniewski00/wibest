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
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // 🔹 Firma
            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();


            $table->integer('year');

            // podstawowy wymiar urlopu (20/26 itd.)
            $table->integer('base_days');

            // przeniesione z poprzedniego roku
            $table->integer('carried_over')->default(0);

            // ile już wykorzystano (zatwierdzone)
            $table->integer('used_days')->default(0);


            $table->timestamps();

            $table->unique(['user_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balances');
    }
};
