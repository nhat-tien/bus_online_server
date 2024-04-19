<?php

namespace App\Http\Resources;

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

        return [
            'maChuyen' => $this->ma_chuyen,
            'taiXe' => new UserResource($this->whenLoaded('user')),
            'maXe' => $this->ma_xe,
            'gioLuotDi' => $this->luot_di,
            'gioLuotVe' => $this->luot_ve,
            'tinhTrang' => $this->tinh_trang,
        ];
    }
}
