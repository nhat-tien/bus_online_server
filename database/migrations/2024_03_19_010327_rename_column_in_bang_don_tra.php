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
        Schema::table('bang_don_tra', function (Blueprint $table) {
            $table->renameColumn('ma_tram_don', 'ma_tram_di');
            $table->renameColumn('ma_tram_tra', 'ma_tram_den');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bang_don_tra', function (Blueprint $table) {
            //
        });
    }
};
