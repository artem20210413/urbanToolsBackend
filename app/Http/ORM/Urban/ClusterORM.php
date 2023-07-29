<?php

namespace App\Http\ORM\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\iUrbanORM;
use App\Models\City;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;

class ClusterORM implements iUrbanORM
{

    static function all(): Collection
    {
        return Cluster::all();
    }

    static function allActive(): Collection
    {
        return Cluster::query()->where('active', 1)->get();
    }

    static function find(int $id, bool $exception = true): ?Cluster
    {
        $cluster = Cluster::find($id);;

        if (!$cluster && $exception) {
            ExceptionHelper::objectNotFound($id, 'Cluster');
        }

        return $cluster;
    }

    /**
     * @param int $id
     * @param bool $exception
     * @return Cluster
     * @throws ApiException
     */
    static function findActive(int $id, bool $exception = true): object
    {
        $cluster = Cluster::query()->where('id', $id)->where('active', 1)->first();

        if (!$cluster && $exception) {
            ExceptionHelper::objectNotFound($id, 'Cluster');
        }

        return $cluster;
    }

    /**
     * @param Cluster $template
     * @return Cluster|bool
     */
    static function save(mixed $template): Cluster|bool
    {

        $templateId = $template
            ? $template->id
            : null;

        $cluster = $templateId
            ? self::find($template->id, false) ?? new Cluster()
            : new Cluster();

        $cluster->id = $template->id ?? $cluster->id;
        $cluster->name = $template->name ?? $cluster->name;
        $cluster->description = $template->description ?? $cluster->description;
        $cluster->active = $template->active ?? $cluster->active ?? true;

        $cluster->save();

        return $cluster;
    }


    static function delete(int $id): void
    {
        $cluster = self::find($id);
        $cluster->delete();
    }

    static function deactivate(int $id): Cluster|bool
    {
        $cluster = self::find($id);
        $cluster->active = false;

        return self::save($cluster);
    }

    static function activate(int $id): Cluster|bool
    {
        $cluster = self::find($id);
        $cluster->active = true;

        return self::save($cluster);
    }

}
