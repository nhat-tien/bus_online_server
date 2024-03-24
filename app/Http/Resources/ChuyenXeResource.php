<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChuyenXeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $driver = User::find($this->ma_tai_xe);

        return [
            'maChuyen' => $this->ma_chuyen,
            'taiXe' => new UserResource($driver),
            'maXe' => $this->ma_xe,
            'gioLuotDi' => $this->luot_di,
            'gioLuotVe' => $this->luot_ve,
            'tinhTrang' => $this->tinh_trang,
        ];
    }
}
