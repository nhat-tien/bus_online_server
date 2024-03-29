<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BangDonTraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $khach = User::find($this->ma_khach_hang)->first();

        return [
            'id' => $this->id,
            'maChuyen' => $this->ma_chuyen,
            'maKhachHang' => $this->ma_khach_hang,
            'tenKhachHang' => $khach->name,
            'maTramDi' => $this->ma_tram_di,
            'maTramDen' => $this->ma_tram_den,
            'hoanThanh' => $this->hoan_thanh,
            'trangThaiThanhToan' => $this->trang_thai_thanh_toan,
            'tienPhi' => $this->tien_phi,
        ];
    }
}
