<?php

namespace App\Http\Controllers\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CaseRequest;
use App\Http\Resources\CaseResource;
use App\Http\Resources\ClusterResource;
use App\Models\Cases;
use App\Services\Urban\CaseService;
use App\Services\Urban\CityService;
use App\Services\Urban\ClusterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function all(CaseService $service): JsonResponse
    {
        try {
            $clusters = $service->all();
            $res = CaseResource::collection($clusters);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function show(int $clusterId, CaseService $service): JsonResponse
    {
        try {
            $cluster = $service->show($clusterId);
            $res = new CaseResource($cluster);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function listByCity(int $cityId, CaseService $service): JsonResponse
    {
        try {
            $clusters = $service->listByCity($cityId);
            $res = CaseResource::collection($clusters);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }
    public function listByCluster(int $clusterId, CaseService $service): JsonResponse
    {
        try {
            $clusters = $service->listByCluster($clusterId);
            $res = CaseResource::collection($clusters);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    public function save(CaseRequest $request, CaseService $service): JsonResponse
    {
        try {
            $case = $service->save($request);
            $res = new CaseResource($case);
            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }


    public function active(int $clusterId, string $active, CaseService $service): JsonResponse
    {
        try {
            $cluster = $service->active($clusterId, $active);
            $res = new CaseResource($cluster);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }
}
