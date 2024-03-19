<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChiTietTuyen extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_tuyen';

    public $timestamps = false;

    protected $fillable = [
        'ma_tuyen',
        'thu_tu_tram',
        'ma_tram',
    ];

    public function tram(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tram', 'ma_tram');
    }

    public function tuyen(): BelongsTo
    {
        return $this->belongsTo(Tram::class, 'ma_tuyen', 'ma_tuyen');
    }
}
