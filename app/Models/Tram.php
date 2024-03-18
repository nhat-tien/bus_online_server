<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tram extends Model
{
    use HasFactory;

    protected $table = 'tram';

    protected $primaryKey = 'ma_tram';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'ma_tram',
        'ten_tram',
    ];

    public function donKhach(): HasMany
    {
        return $this->hasMany(BangDonTra::class, 'ma_tram_don', 'ma_tram');
    }

    public function traKhach(): HasMany
    {
        return $this->hasMany(BangDonTra::class, 'ma_tram_tra', 'ma_tram');
    }

    public function chiTietTuyen(): HasMany
    {
        return $this->hasMany(ChiTietTuyen::class, 'ma_tram', 'ma_tram');
    }
}
