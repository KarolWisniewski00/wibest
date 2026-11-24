<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('employee_contracts', function (Blueprint $t) { $t->json('details')->nullable(); $t->string('configuration_status')->nullable(); });
        Schema::table('employee_tax_settings', function (Blueprint $t) { $t->json('declarations')->nullable(); });
        Schema::create('company_payroll_parameters', function (Blueprint $t) {
            $t->id(); $t->foreignId('company_id')->constrained(); $t->foreignId('created_by')->constrained('users');
            $t->date('effective_from'); $t->unsignedInteger('accident_bp'); $t->timestamps(); $t->unique(['company_id','effective_from']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('company_payroll_parameters');
        Schema::table('employee_contracts', fn (Blueprint $t) => $t->dropColumn(['details','configuration_status']));
        Schema::table('employee_tax_settings', fn (Blueprint $t) => $t->dropColumn('declarations'));
    }
};
