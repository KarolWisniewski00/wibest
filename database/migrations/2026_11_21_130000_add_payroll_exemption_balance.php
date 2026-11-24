<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::table('payroll_opening_balances', function (Blueprint $t) { $t->unsignedBigInteger('exempt_revenue_cents')->nullable(); }); }
    public function down(): void { Schema::table('payroll_opening_balances', function (Blueprint $t) { $t->dropColumn('exempt_revenue_cents'); }); }
};
