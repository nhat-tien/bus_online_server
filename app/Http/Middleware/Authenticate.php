<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : '/';
    // }
    protected function unauthenticated($request, array $guards): void
    {
        abort(response()->json([
            'code' => 401,
            'status' => false,
            'message' => 'Unauthenticated',
        ], 401));
    }
}
