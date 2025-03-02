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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->string('git_link')->nullable();

            $table->date('domain_date')->nullable();
            $table->string('domain_service')->nullable();
            $table->string('domain_service_login')->nullable();
            $table->string('domain_service_password')->nullable();

            $table->date('server_date')->nullable();
            $table->string('server_service')->nullable();
            $table->string('server_service_login')->nullable();
            $table->string('server_service_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('git_link');
            
            $table->dropColumn('domain_date');
            $table->dropColumn('domain_service');
            $table->dropColumn('domain_service_login');
            $table->dropColumn('domain_service_password');

            $table->dropColumn('server_date');
            $table->dropColumn('server_service');
            $table->dropColumn('server_service_login');
            $table->dropColumn('server_service_password');
        });
    }
};
