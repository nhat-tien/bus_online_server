<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function() {

    Route::post('register', [AuthController::class, 'register']);

    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function() {

        Route::post('logout', [AuthController::class, 'logout']);

        /* TODO:
        */
        Route::get('user/information', function(){});

        Route::get('tuyen', function(Request $request){
            return [
                "tramDi" => $request->query('tramdi'),
                "tramDen" => $request->query('tramden'),
            ];
        });


        Route::post('chuyen', function(){});
    });
});

