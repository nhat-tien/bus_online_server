<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'maTram' => $this->ma_tram,
            'tenTram' => $this->ten_tram,
            'tuyen' => ChiTietTuyenResource::collection($this->whenLoaded('chiTietTuyen')),
        ];
    }
}
