<?php

namespace App\Http\Controllers\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClusterRequest;
use App\Http\Resources\ClusterResource;
use App\Services\Urban\CityService;
use App\Services\Urban\ClusterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    /**
     * @param ClusterService $service
     * @return JsonResponse
     */
    public function all(ClusterService $service): JsonResponse
    {
        try {
            $clusters = $service->all();
            $res = ClusterResource::collection($clusters);

            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    /**
     * @param int $clusterId
     * @param ClusterService $service
     * @return JsonResponse
     */
    public function show(int $clusterId, ClusterService $service): JsonResponse
    {
        try {
            $cluster = $service->show($clusterId);
            $res = new ClusterResource($cluster);
            return success($res);
        } catch (ApiException $e) {
            return error($e);
        }
    }

    /**
     * @param ClusterRequest $request
     * @param ClusterService $service
     * @return JsonResponse
     */
    public function save(ClusterRequest $request, ClusterService $service): JsonResponse
    {//TODO Add valid Request
        try {
            $cluster = $service->save($request);
            $res = new ClusterResource($cluster);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }

    /**
     * @param int $clusterId
     * @param string $active
     * @param ClusterService $service
     * @return JsonResponse
     */
    public function active(int $clusterId, string $active, ClusterService $service): JsonResponse
    {
        try {
            $cluster = $service->active($clusterId, $active);
            $res = new ClusterResource($cluster);

            return success($res);
        } catch (ApiException $e) {

            return error($e);
        }
    }
}
