<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChiTietTuyenResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'maTuyen' => $this->ma_tuyen,
            'thuTuTram' => $this->thu_tu_tram,
            'maTram' => $this->ma_tram,
            'tram' => new TramResource($this->whenLoaded('tram')),
        ];
    }
}
