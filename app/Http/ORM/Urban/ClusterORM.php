<?php

namespace App\Http\ORM\Urban;

use App\Http\ORM\iORM;
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

    static function find(int $id): Cluster
    {
        return Cluster::find($id);
    }

    static function findActive(int $id)
    {
        return Cluster::query()->where('id', $id)->where('active', 1)->first();
    }

    /**
     * @param Cluster $template
     * @return Cluster|bool
     */
    static function save(mixed $template): mixed
    {
        $templateId = $template
            ? $template->id
            : null;
        if (!$templateId)
            return false;
        $cluster = $templateId
            ? self::find($template->id) ?? new City()
            : new City();

        $cluster->id = $template->id ?? $cluster->id;
        $cluster->name = $template->name ?? $cluster->name;
        $cluster->description = $template->description ?? $cluster->description;
        $cluster->active = $template->active ?? $cluster->active;

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
        $cluster->active = 1;

        return self::save($cluster);
    }

    static function activate(int $id): Cluster|bool
    {
        $cluster = self::find($id);
        $cluster->active = 0;

        return self::save($cluster);
    }

}
