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
            $table->string('trang_thai_thanh_toan')->nullable(true)->change();
            $table->string('tien_phi')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bang_don_tra', function (Blueprint $table) {
            $table->string('trang_thai_thanh_toan')->nullable(false)->change();
            $table->string('tien_phi')->nullable(false)->change();
        });
    }
};
