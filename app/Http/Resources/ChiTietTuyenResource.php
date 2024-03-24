<?php

namespace App\Http\Resources;

use App\Models\Tram;
use App\Models\Tuyen;
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
        $tram = Tram::where('ma_tram', $this->ma_tram)->first();
        $tuyen = Tuyen::where('ma_tuyen', $this->ma_tuyen)->first();

        return [
            'maTuyen' => $this->ma_tuyen,
            'tenTuyen' => $tuyen->ten_tuyen,
            'thuTuTram' => $this->thu_tu_tram,
            'maTram' => $this->ma_tram,
            'tenTram' => $tram->ten_tram,
        ];
    }
}
