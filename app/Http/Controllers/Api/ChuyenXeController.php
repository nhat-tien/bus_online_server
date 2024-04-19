<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TuyenResource;
use App\Models\Tuyen;

class ChuyenXeController extends Controller
{
    public function index(string $ma_tuyen): TuyenResource
    {
        $tuyen = Tuyen::where('ma_tuyen', $ma_tuyen)->with('chuyenXe.user')->first();

        return new TuyenResource($tuyen);

    }
}
