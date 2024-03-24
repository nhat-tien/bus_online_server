<?php

namespace App\Http\Controllers\Api;

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
