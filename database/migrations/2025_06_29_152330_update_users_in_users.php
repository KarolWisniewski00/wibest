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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->foreignId('supervisor_id')->nullable()->constrained('users')->after('phone');
            $table->date('paid_until')->nullable()->after('supervisor_id');
            $table->date('assigned_at')->nullable()->after('paid_until');
            $table->string('contract_type')->nullable()->after('assigned_at');

            $table->boolean('working_hours_regular')->default(true)->after('contract_type');
            $table->integer('working_hours_custom')->nullable()->after('working_hours_regular');
            $table->time('working_hours_from')->nullable()->after('working_hours_custom');
            $table->time('working_hours_to')->nullable()->after('working_hours_from');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('permission_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permissions');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'supervisor_id',
                'paid_until',
                'assigned_at',
                'contract_type',
                'working_hours_regular',
                'working_hours_custom',
                'working_hours_from',
                'working_hours_to',
            ]);
        });
    }
};
