<?php

namespace App\Services\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\ClusterORM;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ClusterService implements UrbanService
{

    public function all(): Collection
    {
        return ClusterORM::allActive();
    }

    /**
     * @param int $id
     * @return Cluster
     * @throws ApiException
     */
    public function show(int $id): Cluster
    {
        return ClusterORM::findActive($id);
    }

    /**
     * @param Request $request
     * @return Cluster
     */
    public function save(Request $request): Cluster
    {
        $cluster = new Cluster();
        $cluster->id = $request->id;
        $cluster->name = $request->name;
        $cluster->description = $request->description;

        $cluster = ClusterORM::save($cluster);

        return $cluster;
    }

    /**
     * @param int $id
     * @param string $active
     * @return Cluster|bool
     * @throws ApiException
     */
    public function active(int $id, string $active): Cluster|bool
    {
        $act = 'act';
        $dec = 'dec';
        return match ($active) {
            $dec => ClusterORM::deactivate($id),
            $act => ClusterORM::activate($id),
            default => ExceptionHelper::actionIsNotAvailable($active),
        };
    }

}
