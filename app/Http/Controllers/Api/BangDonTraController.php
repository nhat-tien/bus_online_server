<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Http\Services\Api\CustomerService;
use App\Http\Services\Api\DriverService;
use App\Models\ChuyenXe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BangDonTraController extends Controller
{
    public function __construct(
        protected CustomerService $customer,
        protected DriverService $driver
    ){}

    public function getChuyenXeDaDangki(Request $request): BangDonTraCollection
    {
        $response = $this->customer->getChuyenXeDangKi($request->user()->id);
        return $response;
    }

    public function getChuyenXeCuaTaiXe(Request $request): BangDonTraCollection
    {
        $chuyen = ChuyenXe::where('ma_tai_xe', $request->user()->id)->first();
        $maChuyen = $chuyen->maChuyen;
        $response = $this->driver->getChuyenXe($maChuyen);
        return $response;
    }


    public function create(Request $request): JsonResponse
    {
        $response = $this->customer->dangKiChuyenXe($request);

        return response()->json($response, $response['code']);
    }

    public function choThanhToan(Request $request, int $id): JsonResponse
    {
        $response = $this->customer->choThanhToan($id);

        return response()->json($response, $response['code']);
    }

    public function xacNhanThanhToan(Request $request, int $id): JsonResponse
    {
        $response = $this->driver->xacNhanThanhToan($id);

        return response()->json($response, $response['code']);
    }

    public function hoanThanh(Request $request, int $id): JsonResponse
    {
        $response = $this->driver->hoanThanh($id);

        return response()->json($response, $response['code']);
    }

}
