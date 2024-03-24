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

            // add other column as well
        });

        static::updating(function ($doanhThu) {
             // add other column as well
        });

    }

}
