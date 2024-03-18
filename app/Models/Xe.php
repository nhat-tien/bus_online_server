<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Xe extends Model
{
    use HasFactory;

    protected $table = 'xe';

    protected $primaryKey = 'ma_xe';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'ma_xe',
    ];

    public function chuyenXe(): HasMany {

        return $this->hasMany(ChuyenXe::class, 'ma_xe', 'ma_xe');
    }
}
