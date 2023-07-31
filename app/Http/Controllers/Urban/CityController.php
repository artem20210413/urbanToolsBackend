<?php

namespace App\Http\Controllers\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Services\Urban\CityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function all(CityService $service): JsonResponse
    {
        try {
            $cities = $service->all();
            $res = CityResource::collection($cities);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function show(int $cityId, CityService $service): JsonResponse
    {
        try {
            $city = $service->show($cityId);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function save(CityRequest $request, CityService $service): JsonResponse
    {
        try {
            $city = $service->save($request);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }

    /**
     * @param int $cityId
     * @param string $active
     * @param CityService $service
     * @return JsonResponse
     */
    public function active(int $cityId, string $active, CityService $service): JsonResponse
    {
        try {
            $city = $service->active($cityId, $active);
            $res = new CityResource($city);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }

}
