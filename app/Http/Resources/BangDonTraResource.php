<?php

namespace App\Http\Resources;

// use App\Models\User;
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

        return [
            'id' => $this->id,
            'maChuyen' => $this->ma_chuyen,
            'chuyenXe' => new ChuyenXeResource($this->whenLoaded('chuyenXe')),
            'maKhachHang' => $this->ma_khach_hang,
            'tenKhachHang' => $this->ten_khach_hang,
            'khachHang' => new UserResource($this->whenLoaded('user')),
            'maTramDi' => $this->ma_tram_di,
            'tramDi' => new TramResource($this->whenLoaded('tramDon')),
            'maTramDen' => $this->ma_tram_den,
            'tramDen' => new TramResource($this->whenLoaded('tramTra')),
            'hoanThanh' => $this->hoan_thanh,
            'trangThaiThanhToan' => $this->trang_thai_thanh_toan,
            'tienPhi' => $this->tien_phi,
            'soLuong' => $this->so_luong,
            'chieu' => $this->chieu,
            'createdAt' => $this->serializeDate($this->created_at),
            'updatedAt' => $this->serializeDate($this->updated_at),
        ];
    }
}
