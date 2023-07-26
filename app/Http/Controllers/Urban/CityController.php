<?php

namespace App\Http\Controllers\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\ORM\Urban\CityORM;
use App\Http\Resources\CityResource;
use App\Services\Urban\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function all(CityService $cityService)
    {
        try {
            $cities = $cityService->all();

            $res = CityResource::collection($cities);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function show($cityId, CityService $cityService)
    {
        try {
            $city = $cityService->show($cityId);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function save(Request $request, CityService $cityService) //TODO Add valid request
    {

        try {
            $city = $cityService->save($request);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }
}
