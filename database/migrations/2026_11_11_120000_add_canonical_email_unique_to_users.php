<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Stop before DDL; never merge/delete existing accounts automatically.
        if (DB::table('users')->whereNotNull('email')->selectRaw('LOWER(TRIM(email)) AS canonical')
            ->groupByRaw('LOWER(TRIM(email))')->havingRaw('COUNT(*) > 1')->exists()) {
            throw new RuntimeException('Wykryto kolizje adresów e-mail. Wymagana ręczna weryfikacja przed migracją.');
        }
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE users ADD COLUMN email_canonical VARCHAR(255) GENERATED ALWAYS AS (LOWER(TRIM(email))) STORED, ADD UNIQUE INDEX users_email_canonical_unique (email_canonical)');
        } else {
            DB::statement('CREATE UNIQUE INDEX users_email_canonical_unique ON users (LOWER(TRIM(email)))');
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE users DROP INDEX users_email_canonical_unique, DROP COLUMN email_canonical');
        } else {
            DB::statement('DROP INDEX users_email_canonical_unique');
        }
    }
};
