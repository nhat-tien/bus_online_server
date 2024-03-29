<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BangDonTraController;
use App\Http\Controllers\Api\ChuyenXeController;
use App\Http\Controllers\Api\TramController;
use App\Http\Controllers\Api\TuyenController;
use App\Http\Controllers\Api\UserController;
// use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function () {

    Route::post('register', [AuthController::class, 'register']);

    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::post('logout', [AuthController::class, 'logout']);

        Route::get('/user/information', [UserController::class, 'index']);

        Route::get('/tuyen', [TuyenController::class, 'index']);

        Route::get('/tram/{ma_tram}', [TramController::class, 'show']);

        Route::get('/tuyen/{ma_tuyen}', [TuyenController::class, 'show']);

        Route::get('/tuyen/{ma_tuyen}/tram', [TuyenController::class, 'showTram']);

        Route::get('/tuyen/{ma_tuyen}/chuyen-xe', [ChuyenXeController::class, 'index']);

        Route::group(['prefix' => 'customer','middleware' => 'role:customer'], function () {

            Route::post('/bang-don-tra', [BangDonTraController::class, 'create']);

            Route::put('/bang-don-tra/{id}', [BangDonTraController::class, 'choThanhToan']);

        });

        Route::group(['prefix' => 'driver', 'middleware' => 'role:driver'], function () {

            Route::put('/bang-don-tra/{id}/hoan-thanh', [BangDonTraController::class, 'hoanThanh']);

            Route::put('/bang-don-tra/{id}', [BangDonTraController::class, 'xacNhanThanhToan']);
        });

    });
});
