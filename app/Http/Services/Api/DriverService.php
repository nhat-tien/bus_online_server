<?php

namespace App\Http\Services\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Http\Resources\BangDonTraResource;
use App\Models\BangDonTra;

class DriverService
{
    /**
     * @return array<string,mixed>
     */
    public function xacNhanThanhToan(int $id): array
    {
        try {

            BangDonTra::find($id)->update(['trang_thai_thanh_toan' => 'done']);

            $bangDonTra = BangDonTra::find($id)->first();

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Cap Nhat Thanh Cong',
                'bangDonTra' => new BangDonTraResource($bangDonTra),
            ];

        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }


    /**
     * @return array<string,mixed>
     */
    public function hoanThanh(int $id): array
    {
        try {

            BangDonTra::find($id)->update(['hoan_thanh' => true]);

            $bangDonTra = BangDonTra::find($id)->first();

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Cap Nhat Thanh Cong',
                'bangDonTra' => new BangDonTraResource($bangDonTra),
            ];

        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }


    public function getChuyenXe(string $maChuyen): BangDonTraCollection
    {
        try {

            $bangDonTra = BangDonTra::where('ma_chuyen', $maChuyen)->where('hoan_thanh', false)->get();
            return  new BangDonTraCollection($bangDonTra);

        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }
}
