<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TuyenCollection;
use App\Http\Resources\TuyenResource;
use App\Models\Tuyen;

class TuyenController extends Controller
{
    public function index(): TuyenCollection
    {
       $tuyen = Tuyen::all();
       return new TuyenCollection($tuyen);
    }
    /**
     * @return TuyenResource
     */
    public function showTram(string $ma_tuyen): TuyenResource
    {
        $tuyen = Tuyen::where('ma_tuyen', $ma_tuyen)->with("chiTietTuyen")->first();

        return new TuyenResource($tuyen);
    }

     /**
     * @return TuyenResource
     */
    public function show(string $ma_tuyen): TuyenResource
    {
        $tuyen = Tuyen::where('ma_tuyen', $ma_tuyen)->first();

        return new TuyenResource($tuyen);
    }

}
