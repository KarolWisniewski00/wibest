<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_company_history', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreignId('company_id');

            $table->dateTime('assigned_at')->nullable();
            $table->dateTime('unassigned_at')->nullable();

            $table->date('employment_start')->nullable();
            $table->date('employment_end')->nullable();

            $table->date('paid_from')->nullable();
            $table->date('paid_to')->nullable();

            $table->timestamps();
        });
        // 2. kopiowanie danych
        DB::table('users')
            ->whereNotNull('assigned_at')
            ->orderBy('id')
            ->chunk(100, function ($users) {
                $insert = [];

                foreach ($users as $user) {
                    $insert[] = [
                        'user_id' => $user->id,
                        'company_id' => $user->company_id,
                        'assigned_at' => $user->assigned_at,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                DB::table('user_company_history')->insert($insert);
            });

        // 3. usunięcie kolumn
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['assigned_at', 'paid_until']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. przywrócenie kolumn
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('assigned_at')->nullable();
            $table->date('paid_until')->nullable();
        });

        // 2. kopiowanie danych z historii do users
        DB::table('user_company_history')
            ->orderBy('id')
            ->chunk(100, function ($rows) {

                foreach ($rows as $row) {
                    DB::table('users')
                        ->where('id', $row->user_id)
                        ->update([
                            'assigned_at' => $row->assigned_at,
                            // jeśli chcesz:
                            // 'paid_until' => $row->paid_to,
                        ]);
                }
            });

        // 3. usunięcie tabeli
        Schema::dropIfExists('user_company_history');
    }
};
