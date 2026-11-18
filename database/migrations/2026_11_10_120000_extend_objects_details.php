<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('objects', function (Blueprint $table) {
            $table->string('object_type')->nullable();

        });
        // SQLite stores dates as text; MySQL needs a native type change.
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE objects MODIFY starts_at DATETIME NULL, MODIFY ends_at DATETIME NULL');
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE objects MODIFY starts_at DATE NULL, MODIFY ends_at DATE NULL');
        }
        Schema::table('objects', function (Blueprint $table) {
            $table->dropColumn('object_type');

        });
    }
};
