<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DateTimeInterface;

class BangDonTra extends Model
{
    use HasFactory;

    protected $table = 'bang_don_tra';

    protected $fillable = [
        'ma_chuyen',
        'ma_khach_hang',
        'ten_khach_hang',
        'ma_tram_di',
        'ma_tram_den',
        'hoan_thanh',
        'trang_thai_thanh_toan',
        'tien_phi',
        'so_luong',
        'chieu',
    ];

    public function chuyenXe(): BelongsTo
    {
        return $this->belongsTo(ChuyenXe::class, 'ma_chuyen', 'ma_chuyen');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ma_khach_hang', 'id');
    }

    public function tramDon(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tram_di', 'ma_tram');
    }

    public function tramTra(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tram_den', 'ma_tram');
    }

    public function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
