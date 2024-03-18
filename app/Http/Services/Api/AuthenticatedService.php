<?php

namespace App\Http\Services\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            $validateUser = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validateUser->fail()) {
               return [
                    'code' => 400,
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ];
            };

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
                'tokenType' => 'Bearer'
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
            $validateUser = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validateUser->fail()) {

               return [
                    'code' => 400,
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ];
            };

            if(!Auth::attempt($request->only(['email', 'password']))) {
                return [
                    'code' => 401,
                    'status' => false,
                    'message' => 'Email or password incorrect',
                ];
            }

            $user = User::where('email', $request->email)->first();

            $token = $user->createtoken('access_token');

            return [
                'code' => 200,
                'status' => true,
                'message' => 'Login Successful',
                'token' => $token->plainTextToken,
                'tokenType' => 'Bearer'
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
