<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BangDonTra extends Model
{
    use HasFactory;

    protected $table = 'bang_don_tra';

    protected $fillable = [
        'ma_chuyen',
        'ma_khach_hang',
        'ma_tram_di',
        'ma_tram_den',
        'hoan_thanh',
        'trang_thai_thanh_toan',
        'tien_phi'
    ];

    public function chuyenXe(): BelongsTo
    {
      return $this->belongsTo(ChuyenXe::class, 'ma_chuyen','ma_chuyen' );
    }

    public function tramDon(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tram_di', 'ma_tram');
    }

    public function tramTra(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tram_den', 'ma_tram');
    }
}
