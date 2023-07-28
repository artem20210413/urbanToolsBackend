<?php

namespace App\Http\Controllers\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\ORM\Urban\CityORM;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Services\Urban\CityService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

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

    public function show(int $cityId, CityService $cityService)
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

    /**
     * @param int $cityId
     * @param string $active Possible values: 'act' or 'dec'
     * @param CityService $cityService
     * @return void
     */
    public function active(int $cityId, string $active, CityService $cityService)
    {
        try {
            $city = $cityService->active($cityId, $active);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }


}
