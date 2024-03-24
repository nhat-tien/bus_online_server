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
        Schema::create('bang_don_tra', function (Blueprint $table) {
            $table->id();
            $table->string('ma_chuyen');
            $table->integer('ma_khach_hang');
            $table->string('ma_tram_don');
            $table->string('ma_tram_tra');
            $table->boolean('hoan_thanh');
            $table->string('trang_thai_thanh_toan');
            $table->string('tien_phi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bang_don_tra');
    }
};
