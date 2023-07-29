<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Urban\CaseController;
use App\Http\Controllers\Urban\CityController;
use App\Http\Controllers\Urban\ClusterController;
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


    //TODO only upon registration
    Route::post('/city', [CityController::class, 'save']);
    Route::get('/city', [CityController::class, 'all']);
    Route::get('/city/{cityId}/show', [CityController::class, 'show']);
    Route::post('/city/{cityId}/active/{active}', [CityController::class, 'active']);

    //TODO only upon registration
    Route::post('/cluster', [ClusterController::class, 'save']);
    Route::get('/cluster', [ClusterController::class, 'all']);
    Route::get('/cluster/{clusterId}/show', [ClusterController::class, 'show']);
    Route::post('/cluster/{clusterId}/active/{active}', [ClusterController::class, 'active']);


    //TODO only upon registration
    Route::post('/case', [CaseController::class, 'save']);
    Route::get('/case', [CaseController::class, 'all']);
    Route::get('/case/{caseId}/show', [CaseController::class, 'show']);
    Route::post('/case/{caseId}/active/{active}', [CaseController::class, 'active']);


});
