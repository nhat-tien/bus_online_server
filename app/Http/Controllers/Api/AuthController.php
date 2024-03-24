<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\AuthenticatedService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(protected AuthenticatedService $auth) {}
	/**
	*
	* @return JsonResponse
	*/
	public function login(Request $request): JsonResponse
    {
        $response = $this->auth->login($request);

		return response()->json($response, $response['code']);
    }

    public function register(Request $request): JsonResponse
	{
		$response = $this->auth->register($request);

		return response()->json($response, $response['code']);
    }

    public function logout(Request $request): JsonResponse
	{
		$response = $this->auth->logout($request);

		return response()->json($response, $response['code']);
	}
}
