<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TramResource;
use App\Models\Tram;
// use Illuminate\Http\Request;

class TramController extends Controller
{
    public function show(string $ma_tram): TramResource
    {
        $tram = Tram::where('ma_tram', $ma_tram)->with('chiTietTuyen')->first();

        return new TramResource($tram);
    }
}
