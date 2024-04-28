<?php

namespace App\Http\Services\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Http\Resources\BangDonTraResource;
use App\Models\BangDonTra;
use App\Models\ChuyenXe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverService
{
    /**
     * @return array<string,mixed>
     */
    public function hoanThanh(Request $request): array
    {
        try {
            $validate = Validator::make($request->all(), [
                'id' => ['required','numeric'],
            ]);

            if ($validate->fails()) {
                return [
                     'code' => 400,
                     'status' => false,
                     'message' => 'Validation Error',
                     'errors' => $validate->errors(),
                 ];
            };

            $chuyenXe = ChuyenXe::where('ma_tai_xe',$request->user()->id)->first();
            $bangDonTra = BangDonTra::find($request->id);

            if($chuyenXe->ma_chuyen != $bangDonTra->ma_chuyen) {
                return [
                     'code' => 400,
                     'status' => false,
                     'message' => 'Ma Chuyen Khong Khop',
                 ];
            }

            $bangDonTra->hoan_thanh = true;

            $bangDonTra->save();

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
    public function getChuyenXe(Request $request): array
    {
        try {
            $maTaiXe = $request->user()->id;
            $chuyenXe = ChuyenXe::where('ma_tai_xe', $maTaiXe)->first();
            $bangDonTra = BangDonTra::where('ma_chuyen', $chuyenXe->ma_chuyen)->where('hoan_thanh', false)->get();
            return [
                'code' => 200,
                'status' => true,
                'bangDonTra' => new BangDonTraCollection($bangDonTra),
            ];
        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }
}
