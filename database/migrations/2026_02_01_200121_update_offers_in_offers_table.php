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
        Schema::dropIfExists('offer_items');
        Schema::table('offers', function (Blueprint $table) {
            // USUWAMY zbędne kolumny
            $columnsToDrop = [
                'due_date',
                'subtotal',
                'vat',
                'total',
                'seller_name',
                'seller_adress',
                'seller_tax_id',
                'seller_bank',
                'buyer_name',
                'buyer_adress',
                'buyer_tax_id',
                'buyer_person_name',
                'buyer_person_email',
                'total_in_words',
                'notes',
                'status',
                'discount',
                'price_after_discount',
            ];
            if (Schema::hasColumn('offers', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('offers', $column)) {
                    $table->dropColumn($column);
                }
            }

            if (!Schema::hasColumn('offers', 'users')) {
                $table->integer('users')->default(1);
            }
            if (!Schema::hasColumn('offers', 'price_per_user')) {
                $table->decimal('price_per_user', 8, 2)->default(10.00);
            }
            if (!Schema::hasColumn('offers', 'monthly_price')) {
                $table->decimal('monthly_price', 10, 2)->default(10.00);
            }

            // PROBLEM_DESCRIPTION (Sekcja A)
            if (!Schema::hasColumn('offers', 'problem_description')) {
                $table->text('problem_description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $columnsToDrop = [
                'price_per_user',
                'monthly_price',
                'problem_description',
            ];

            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('offers', $column)) {
                    $table->dropColumn($column);
                }
            }
            // Przywracamy poprzedni stan tabeli (opcjonalnie)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->date('due_date')->nullable();
            $table->string('status')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_adress')->nullable();
            $table->string('seller_tax_id')->nullable();
            $table->string('seller_bank')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_adress')->nullable();
            $table->string('buyer_tax_id')->nullable();
            $table->string('buyer_person_name')->nullable();
            $table->string('buyer_person_email')->nullable();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('vat', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->string('total_in_words')->nullable();
            $table->text('notes')->nullable();
            $table->string('discount')->nullable();
            $table->string('price_after_discount')->nullable();
        });
        Schema::create('offer_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('set_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('unit_price', 15, 2);
            $table->string('unit')->nullable();
            $table->decimal('subtotal', 15, 2);
            $table->string('vat_rate');
            $table->string('vat_amount');
            $table->decimal('total', 15, 2);
            $table->timestamps();
        });
    }
};
