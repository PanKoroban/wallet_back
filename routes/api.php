<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryImgController;
use App\Http\Controllers\SpendingController;
use \App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/category', CategoryController::class);

Route::apiResource('/categoryImg', CategoryImgController::class);

Route::apiResource('/spending', SpendingController::class);

Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', 'index');
    Route::post('/setting', 'store');
});
