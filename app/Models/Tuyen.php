<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tuyen extends Model
{
    use HasFactory;

    protected $table = 'tuyen';

    protected $primaryKey = 'ma_tuyen';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'ma_tuyen',
        'ten_tuyen'
    ];

    public function chuyenXe(): HasMany
    {
       return $this->hasMany(ChuyenXe::class,'ma_tuyen', 'ma_tuyen');
    }

    public function chiTietTuyen(): HasMany
    {
        return $this->hasMany(ChiTietTuyen::class, 'ma_tuyen', 'ma_tuyen');
    }
}
