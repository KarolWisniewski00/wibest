<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('ai_classification', 30)
                ->nullable();

            $table->text('ai_classification_reason')
                ->nullable();

            $table->timestamp('ai_classification_updated_at')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'ai_classification',
                'ai_classification_reason',
                'ai_classification_updated_at',
            ]);
        });
    }
};