<?php

namespace App\Http\Services\Api;

use App\Http\Resources\ChiTietTuyenResource;
use App\Http\Resources\TuyenResource;
use App\Models\ChiTietTuyen;


class CustomerService
{
    /* TODO:
    *  - dang ki chuyen xe
    *  - Lay ten tuyen tu ma tram
    *  - lay danh sach chuyen xe (kem thong tin) tu tuyen
    *  - Dang ki chuyen xe
    *  - Tinh tien chuyen di
    */

    /*
    * @return array
    */
    public function chiTietTuyen(string $ma_tram): ChiTietTuyenResource
    {
        $tuyen = ChiTietTuyen::where('ma_tram',$ma_tram)->first()->tuyen();

        return new TuyenResource($tuyen);
    }

}
