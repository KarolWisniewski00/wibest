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
        Schema::table('offers', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->after('id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->string('project_scope')->after('project_id')->nullable();
            $table->string('due_term')->after('project_scope')->nullable();
            $table->string('status')->after('due_term')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
            $table->dropColumn('project_scope');
            $table->dropColumn('due_term');
            $table->dropColumn('status');
        });
    }
};
