<?php

namespace App\Http\Services\Api;

use App\Http\Resources\BangDonTraCollection;
use App\Http\Resources\BangDonTraResource;
use App\Models\BangDonTra;
use App\Models\ChiTietTuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerService
{
    /**
     * @return array<string,mixed>
     */
    public function dangKiChuyenXe(Request $request): array
    {
        try {
            $validate = Validator::make($request->all(), [
                'maTramDi' => ['required'],
                'maTramDen' => ['required'],
                'maTuyen' => ['required'],
                'maChuyen' => ['required'],
                'soLuong' => ['required','numeric'],
                'chieu' => ['required'],
            ]);

            if ($validate->fails()) {
                return [
                     'code' => 400,
                     'status' => false,
                     'message' => 'Validation Error',
                     'errors' => $validate->errors(),
                 ];
            };

            $user = $request->user();

            $bangDonTra = BangDonTra::create([
                'ma_chuyen' => $request->maChuyen,
                'ma_khach_hang' => $user->id,
                'ma_tram_di' => $request->maTramDi,
                'ma_tram_den' => $request->maTramDen,
                'hoan_thanh' => false,
                'trang_thai_thanh_toan' => null,
                'tien_phi' => $this->tinhTien($request->maTramDi, $request->maTramDen, $request->maTuyen, $request->soLuong),
                'so_luong' => $request->soLuong,
                'chieu' => $request->chieu,
            ]);


            return [
                'code' => 200,
                'status' => true,
                'message' => 'Dang Ki Thanh Cong',
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

    private function tinhTien(string $maTramDi, string $maTramDen, string $maTuyen, int $soLuong): int
    {

        $tramDi = ChiTietTuyen::where('ma_tuyen', $maTuyen)->where('ma_tram', $maTramDi)->first();
        $tramDen = ChiTietTuyen::where('ma_tuyen', $maTuyen)->where('ma_tram', $maTramDen)->first();

        $thuTuCuaTramDi = $tramDi->thu_tu_tram;
        $thuTuCuaTramDen = $tramDen->thu_tu_tram;

        $tatCaTram = ChiTietTuyen::where('ma_tuyen', $maTuyen)->get();

        $tongTien = 0;

        if($thuTuCuaTramDi < $thuTuCuaTramDen) {
            foreach ($tatCaTram as $tram) {
                if($tram->thu_tu_tram >= $thuTuCuaTramDi && $tram->thu_tu_tram < $thuTuCuaTramDen) {
                    $tongTien += $tram->tien_phi;
                }
            }
        } else {
            foreach ($tatCaTram as $tram) {
                if($tram->thu_tu_tram < $thuTuCuaTramDi && $tram->thu_tu_tram >= $thuTuCuaTramDen) {
                    $tongTien += $tram->tien_phi;
                }
            }
        };

        return $tongTien*$soLuong;
    }
    /**
     * @return array<string,mixed>
     */
    public function getChuyenXeDangKi(Request $request): array
    {
        try {
            $bangDonTra = BangDonTra::where('ma_khach_hang', $request->user()->id)->where('trang_thai_thanh_toan', null)->where('hoan_thanh', false)->with('tramDon')->with('tramTra')->with('user')->with('chuyenXe')->get();
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

    /**
     * @return array<string,mixed>
     */
    public function suDungVe(Request $request): array
    {
        try {

            $validate = Validator::make($request->all(), [
                'id' => ['required','numeric'],
                'maChuyen' => ['required'],
            ]);

            if ($validate->fails()) {
                return [
                     'code' => 400,
                     'status' => false,
                     'message' => 'Validation Error',
                     'errors' => $validate->errors(),
                 ];
            };

            $hoaDon = BangDonTra::find($request->id);

            if($request->maChuyen != $hoaDon->ma_chuyen) {
                return [
                     'code' => 400,
                     'status' => false,
                     'message' => 'Ma Chuyen Khong Khop',
                 ];
            }

            $hoaDon->trang_thai_thanh_toan = "done";

            $hoaDon->save();

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Cap Nhat Thanh Cong',
                'bangDonTra' => new BangDonTraResource($hoaDon),
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
    public function choThanhToan(int $id): array
    {
        try {

            BangDonTra::find($id)->update(['trang_thai_thanh_toan' => 'wait']);

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
    public function thongBaoTienCanTra(Request $request): array
    {
        try {

            $maTramDi = $request->query('maTramDi');
            $maTramDen = $request->query('maTramDen');
            $maTuyen = $request->query('maTuyen');
            $soLuong = $request->query('soLuong');
            $tienPhi = $this->tinhTien($maTramDi, $maTramDen, $maTuyen, $soLuong);

            return [
                'code' => 200,
                'status' => true,
                'tienPhi' => $tienPhi,
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
