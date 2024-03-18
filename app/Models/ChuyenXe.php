<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChuyenXe extends Model
{
    use HasFactory;

    protected $table = 'chuyen_xe';

    protected $primaryKey = 'ma_chuyen';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'ma_chuyen',
        'ma_tuyen',
        'ma_tai_xe',
        'ma_xe',
        'gio_bat_dau',
        'tinh_trang',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ma_tai_xe');
    }

    public function xe(): BelongsTo
    {
        return $this->belongsTo(Xe::class,'ma_xe', 'ma_xe');
    }

    public function tuyen(): BelongsTo
    {
        return $this->belongsTo(Tuyen::class, 'ma_tuyen', 'ma_tuyen');
    }

    public function bangDonTra(): HasMany
    {
        return $this->hasMany(BangDonTra::class, 'ma_chuyen', 'ma_chuyen');
    }
}
