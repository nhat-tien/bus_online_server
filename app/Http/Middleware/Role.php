<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param string[] $roles
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        $user = Auth::user();

        foreach ($roles as $role) {
            if($user->hasRole($role)) {
                return $next($request);
            }
        }
        return response()->json([
            'code' => 403,
            'status' => false,
            'message' => 'Forbidden',
        ],403);
    }
}
