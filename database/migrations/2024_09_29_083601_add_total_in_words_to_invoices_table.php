<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('total_in_words')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('total_in_words');
        });
    }
    
};
