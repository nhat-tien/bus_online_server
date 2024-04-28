<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Http\Services\Api\CustomerService;
use App\Http\Services\Api\DriverService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BangDonTraController extends Controller
{
    public function __construct(
        protected CustomerService $customer,
        protected DriverService $driver
    ){}

    public function getChuyenXeDaDangKi(Request $request): JsonResponse
    {
        $response = $this->customer->getChuyenXeDangKi($request);

        return response()->json($response, $response['code']);
    }

    public function getChuyenXeCuaTaiXe(Request $request): JsonResponse
    {
        $response = $this->driver->getChuyenXe($request);

        return response()->json($response, $response['code']);
    }

    public function thongBaoTienCanTra(Request $request): JsonResponse
    {
        $response = $this->customer->thongBaoTienCanTra($request);

        return response()->json($response, $response['code']);
    }

    public function create(Request $request): JsonResponse
    {
        $response = $this->customer->dangKiChuyenXe($request);

        return response()->json($response, $response['code']);
    }

    public function suDungVe(Request $request): JsonResponse
    {
        $response = $this->customer->suDungVe($request);

        return response()->json($response, $response['code']);
    }

    public function hoanThanh(Request $request): JsonResponse
    {
        $response = $this->driver->hoanThanh($request);

        return response()->json($response, $response['code']);
    }

}
