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
        Schema::table('chuyen_xe', function (Blueprint $table) {
            $table->renameColumn('gio_bat_dau', 'luot_di');
            $table->time('luot_ve');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chuyen_xe', function (Blueprint $table) {
            //
        });
    }
};
