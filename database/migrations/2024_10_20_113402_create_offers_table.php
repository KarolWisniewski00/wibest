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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->string('status')->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('vat', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('seller_name');
            $table->string('seller_adress');
            $table->string('seller_tax_id');
            $table->string('seller_bank')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_adress')->nullable();
            $table->string('buyer_tax_id')->nullable();
            $table->string('buyer_person_name')->nullable();
            $table->string('buyer_person_email')->nullable();
            $table->text('notes')->nullable();
            $table->string('total_in_words')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
