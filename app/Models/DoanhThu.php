<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhThu extends Model
{
    use HasFactory;

    protected $table = 'doanh_thu';

    protected $fillable = [
        'ngay_lap_thong_ke',
        'tong_doanh_thu',
    ];

    protected static function boot(): void {
        parent::boot();

        static::creating(function ($doanhThu) {
            $tongDoanhThu = 0;
            $doanhThuTrongNgay = BangDonTra::whereDate('created_at', $doanhThu->ngay_lap_thong_ke)->where('trang_thai_thanh_toan', 'done')->get();
            foreach ($doanhThuTrongNgay as $doanhThuTungKhach) {
                $tongDoanhThu += $doanhThuTungKhach->tien_phi;
            };

            $doanhThu->tong_doanh_thu = $tongDoanhThu;
        });

        static::updating(function ($doanhThu) {
            $tongDoanhThu = 0;
            $doanhThuTrongNgay = BangDonTra::whereDate('created_at', $doanhThu->ngay_lap_thong_ke)->where('trang_thai_thanh_toan', 'done')->get();
            foreach ($doanhThuTrongNgay as $doanhThuTungKhach) {
                $tongDoanhThu += $doanhThuTungKhach->tien_phi;
            };

            $doanhThu->tong_doanh_thu = $tongDoanhThu;
        });

    }

}
