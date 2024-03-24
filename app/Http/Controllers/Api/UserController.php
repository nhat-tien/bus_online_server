<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @return UserResource
     */
    public function index(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
