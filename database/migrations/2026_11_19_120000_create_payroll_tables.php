<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('created_by')->constrained('users');
            $table->date('effective_from');
            $table->date('starts_on');
            $table->date('ends_on')->nullable();
            $table->string('type', 30);
            $table->string('settlement', 30);
            $table->decimal('fte', 5, 4)->nullable();
            $table->decimal('monthly_gross', 12, 2)->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->string('overtime_rule', 30)->default('review');
            $table->unsignedTinyInteger('night_start')->nullable();
            $table->timestamps();
            $table->index(['company_id', 'user_id', 'effective_from']);
        });
        Schema::create('payroll_snapshots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('created_by')->constrained('users');
            $table->date('month');
            $table->json('payload');
            $table->timestamps();
            $table->unique(['company_id', 'user_id', 'month']);
        });
        Schema::create('payroll_cost_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('confirmed_by')->constrained('users');
            $table->date('month');
            $table->decimal('pension_base_before_month', 12, 2);
            $table->decimal('accident_percent', 5, 2);
            $table->boolean('fp_fs');
            $table->boolean('fgsp');
            $table->decimal('ppk_percent', 5, 2);
            $table->timestamps();
            $table->unique(['company_id', 'user_id', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payroll_cost_inputs');
        Schema::dropIfExists('payroll_snapshots');
        Schema::dropIfExists('employee_contracts');
    }
};
