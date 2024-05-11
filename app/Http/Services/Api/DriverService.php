<?php

namespace App\Http\Services\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Models\BangDonTra;
use App\Models\ChuyenXe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverService
{
    /**
     * @return array<string,mixed>
     */
    public function hoanThanhTram(Request $request): array
    {
        try {
            $validate = Validator::make($request->all(), [
                'maTramDen' => ['required'],
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
            $bangDonTra = BangDonTra::where('ma_chuyen', $chuyenXe->ma_chuyen)
                ->where('ma_tram_den', $request->maTramDen)
                ->where('hoan_thanh', false)
                ->where('trang_thai_thanh_toan', 'done')
                ->update(['hoan_thanh' => true]);

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Cap Nhat Thanh Cong',
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
            $bangDonTra = BangDonTra::where('ma_chuyen', $chuyenXe->ma_chuyen)->where('hoan_thanh', false)->orderBy('updated_at','desc')->with('tramDon')->with('tramTra')->with('user')->with('chuyenXe')->get();
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
