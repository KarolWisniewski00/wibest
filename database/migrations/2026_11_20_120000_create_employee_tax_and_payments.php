<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employee_tax_settings', function (Blueprint $t) {
            $t->id(); $t->foreignId('company_id')->constrained(); $t->foreignId('user_id')->constrained();
            $t->foreignId('created_by')->constrained('users'); $t->date('effective_from');
            $t->unsignedInteger('kup_cents'); $t->unsignedInteger('pit_reduction_cents');
            $t->unsignedInteger('health_legacy_reduction_cents');
            $t->string('exemption'); $t->unsignedInteger('ppk_employee_bp'); $t->unsignedInteger('ppk_employer_bp');
            $t->timestamps(); $t->index(['company_id', 'user_id', 'effective_from']);
        });
        Schema::create('payroll_opening_balances', function (Blueprint $t) {
            $t->id(); $t->foreignId('company_id')->constrained(); $t->foreignId('user_id')->constrained();
            $t->foreignId('created_by')->constrained('users'); $t->unsignedSmallInteger('year');
            $t->date('starts_on');
            $t->unsignedBigInteger('payer_income_cents');
            $t->unsignedBigInteger('pension_base_cents');
            $t->unsignedBigInteger('health_legacy_income_cents');
            $t->timestamps(); $t->unique(['company_id', 'user_id', 'year']);
        });
        Schema::create('payroll_payments', function (Blueprint $t) {
            $t->id(); $t->foreignId('company_id')->constrained(); $t->foreignId('user_id')->constrained();
            $t->foreignId('created_by')->constrained('users'); $t->date('period'); $t->date('paid_on');
            $t->uuid('request_key'); $t->json('payload'); $t->timestamps();
            $t->unique(['company_id', 'request_key']); $t->index(['company_id', 'user_id', 'paid_on']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('payroll_payments'); Schema::dropIfExists('payroll_opening_balances'); Schema::dropIfExists('employee_tax_settings');
    }
};
