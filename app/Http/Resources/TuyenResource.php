<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TuyenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "maTuyen" => $this->ma_tuyen,
            "tenTuyen" => $this->ten_tuyen,
            "chiTietTuyen" => ChiTietTuyenResource::collection($resource)
        ];
    }
}
