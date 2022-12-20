<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryImgController;
use App\Http\Controllers\SpendingController;
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

Route::middleware('auth')->group(function () {

//    Route::apiResource('/balance', BalanceController::class);
    Route::post('/balance', [BalanceController::class, 'store']);

    Route::apiResource('/category', CategoryController::class);

//    Route::apiResource('/categoryImg', CategoryImgController::class);
    Route::get('/categoryImg', [CategoryImgController::class, 'index']);

    Route::apiResource('/spending', SpendingController::class);

});

Auth::routes();

