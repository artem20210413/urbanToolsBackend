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

    Route::middleware('api.auth')->group(function () {

        Route::get('/logout', [AuthController::class, 'logout']);
        Route::post('/registration', [AuthController::class, 'registration']);

        Route::post('/city', [CityController::class, 'save']);
        Route::post('/city/{cityId}/active/{active}', [CityController::class, 'active']);

        Route::post('/cluster', [ClusterController::class, 'save']);
        Route::post('/cluster/{clusterId}/active/{active}', [ClusterController::class, 'active']);


        Route::post('/case', [CaseController::class, 'save']);
        Route::post('/case/{caseId}/active/{active}', [CaseController::class, 'active']);
    });


    Route::get('/city', [CityController::class, 'all']);
    Route::get('/city/{cityId}/show', [CityController::class, 'show']);

    Route::get('/cluster', [ClusterController::class, 'all']);
    Route::get('/cluster/{clusterId}/show', [ClusterController::class, 'show']);

    Route::get('/case', [CaseController::class, 'all']);
    Route::get('/case/search/{search}', [CaseController::class, 'search']);
    Route::get('/case/{caseId}/show', [CaseController::class, 'show']);
    Route::get('/case/city/{cityId}', [CaseController::class, 'listByCity']);
    Route::get('/case/cluster/{clusterId}', [CaseController::class, 'listByCluster']);





});
