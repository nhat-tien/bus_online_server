<?php

namespace App\Http\Services\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;


class AuthenticatedService
{
    /**
     * @param Request $request
     * @return array
     */
    public function register(Request $request): array
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validateUser->fails()) {
               return [
                    'code' => 400,
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors(),
                ];
            };

            $user = User::where('email', $request->email)->first();

            if($user) {
               return [
                    'code' => 409,
                    'status' => false,
                    'message' => 'User already exists',
                ];
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'customer',
            ]);

            Auth::login($user);

            $token = $user->createToken('access_token');

            return [
                'code' => 200,
                'status' => true,
                'message' => 'User Created Successful',
                'token' => $token->plainTextToken,
                'tokenType' => 'Bearer',
                'user' => new UserResource($user),
            ];
        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }

    /**
    *
    *
    * @return array
    */
    public function login(Request $request): array
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
                'role' => ['required'],
            ]);

            if ($validateUser->fails()) {

               return [
                    'code' => 400,
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ];
            };

            if(!Auth::attempt($request->only(['email', 'password', 'role']))) {
                return [
                    'code' => 401,
                    'status' => false,
                    'message' => 'Email or password incorrect',
                ];
            }

            $user = $request->role != 'driver'
            ? User::where('email', $request->email)->first()
            : User::where('email', $request->email)->with('chuyenXe')->first();

            $token = $user->createtoken('access_token');

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Login Successful',
                'token' => $token->plainTextToken,
                'tokenType' => 'Bearer',
                'user' => new UserResource($user),
            ];

        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }


    /**
     * @return array<string,mixed>
     */
    public function logout(Request $request): array
    {
        try {

            $request->user()->currentAccessToken()->delete();

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Logout Successful',
            ];
        } catch(Throwable $th) {
            return [
                'code' => 500,
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }

    }
}
