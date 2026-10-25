<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('crm', function (Blueprint $table) {
            $table->text('plan')->nullable()->after('type');
            $table->text('result')->nullable()->after('plan');
            $table->text('ai_analysis')->nullable()->after('result');
            $table->text('ai_next_step')->nullable()->after('ai_analysis');
            $table->dateTime('ai_next_step_at')->nullable()->after('ai_next_step');
            $table->string('ai_next_step_type', 30)->nullable()->after('ai_next_step_at');
            $table->text('ai_signals')->nullable()->after('ai_next_step_type');
            $table->text('ai_problem')->nullable()->after('ai_signals');
            $table->text('ai_value')->nullable()->after('ai_problem');
            $table->text('ai_missing_information')->nullable()->after('ai_value');
            $table->text('ai_reason')->nullable()->after('ai_missing_information');
            $table->text('ai_should_create_next_step')->nullable()->after('ai_reason');
            $table->text('ai_sales_stage')->nullable()->after('ai_should_create_next_step');
        });
        // Zachowujemy dotychczasowe notatki jako rezultat.
        DB::table('crm')
            ->whereNotNull('notes')
            ->update([
                'result' => DB::raw('notes'),
            ]);

        Schema::table('crm', function (Blueprint $table) {
            $table->dropColumn('notes');
        });
    }

    public function down(): void
    {
        Schema::table('crm', function (Blueprint $table) {
            $table->text('notes')->nullable()->after('type');
        });

        // Przy rollbacku przywracamy rezultat do notes.
        DB::table('crm')
            ->whereNotNull('result')
            ->update([
                'notes' => DB::raw('result'),
            ]);

        Schema::table('crm', function (Blueprint $table) {
            $table->dropColumn([
                'plan',
                'result',
                'ai_analysis',
                'ai_next_step',
                'ai_next_step_at',
            ]);
        });
    }
};