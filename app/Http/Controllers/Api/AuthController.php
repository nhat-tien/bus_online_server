<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\AuthenticatedService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function __construct(AuthenticatedService $auth) {}
	/**
	*
	* @return Response
	*/
	public function login(Request $request): Response
	{
		$response = $this->auth->login($request);

		return response()->json($response, $response->code);
	}

	public function register(Request $request): Response
	{
		$response = $this->auth->register($request);

		return response()->json($response, $response->code);
    }

    public function logout(Request $request): Response
	{
		$response = $this->auth->register($request);

		return response()->json($response, $response->code);
	}
}
