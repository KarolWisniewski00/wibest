<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('object_status_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('object_id')->constrained('objects')->cascadeOnDelete();
            $table->string('status');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at')->nullable();
            $table->boolean('initial_snapshot')->default(false);
            $table->index(['object_id', 'status', 'starts_at', 'ends_at'], 'object_status_period_lookup');
        });

        // A current status cannot establish historical activity. Do not invent past periods.
        $since = now()->toDateTimeString();
        DB::table('objects')->select('id', 'status')->orderBy('id')->chunkById(500, function ($objects) use ($since) {
            DB::table('object_status_periods')->insert($objects->map(fn ($object) => [
                'object_id' => $object->id, 'status' => $object->status,
                'starts_at' => $since, 'ends_at' => null, 'initial_snapshot' => true,
            ])->all());
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('object_status_periods');
    }
};
