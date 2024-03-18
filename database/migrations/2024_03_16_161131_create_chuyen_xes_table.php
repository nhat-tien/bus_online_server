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
        Schema::create('chuyen_xe', function (Blueprint $table) {
            $table->string('ma_chuyen');
            $table->string('ma_tuyen');
            $table->integer('ma_tai_xe');
            $table->string('ma_xe');
            $table->time('gio_bat_dau');
            $table->string('tinh_trang');
            $table->primary('ma_chuyen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyen_xe');
    }
};
