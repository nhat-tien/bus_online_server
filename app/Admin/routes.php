<?php

namespace App\Admin;


use App\Admin\Controllers\BangDonTraController;
use App\Admin\Controllers\ChiTietTuyenController;
use App\Admin\Controllers\ChuyenXeController;
use App\Admin\Controllers\TramController;
use App\Admin\Controllers\TuyenController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\XeController;
use App\Admin\Controllers\DoanhThuController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Facades\Admin;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('/users', UserController::class);
    $router->resource('/bang-don-tra', BangDonTraController::class);
    $router->resource('/chi-tiet-tuyen', ChiTietTuyenController::class);
    $router->resource('/chuyen-xe', ChuyenXeController::class);
    $router->resource('/tram', TramController::class);
    $router->resource('/tuyen', TuyenController::class);
    $router->resource('/xe',XeController::class);
    $router->resource('/doanh-thu',DoanhThuController::class);

});
