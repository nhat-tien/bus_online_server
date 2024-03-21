<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();

        return response()->json([
            "name" => $user->name,
            "email" => $user->email,
        ]);

    }
}
