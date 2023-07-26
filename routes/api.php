<?php

use App\Http\Controllers\AuthController;
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

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('/registration', [AuthController::class, 'registration']);//TODO delete

    Route::middleware('api.auth')->group(function () {

//        Route::post('/registration', [AuthController::class, 'registration']); //TODO uncomment
        Route::post('/images/save', [\App\Http\Controllers\TestController::class, 'storeImage']);
    });

});
