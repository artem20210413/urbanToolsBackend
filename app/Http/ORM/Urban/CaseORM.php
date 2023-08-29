<?php

namespace App\Http\ORM\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\iUrbanORM;
use App\Models\Cases;
use App\Models\City;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class CaseORM implements iUrbanORM
{

    static function all(): Collection
    {
        return Cases::all();
    }

    static function allActive(): Collection
    {
        return Cases::query()->where('active', 1)->get();
    }

    static function find(int $id, bool $exception = true): ?Cases
    {
        $cluster = Cases::find($id);

        if (!$cluster && $exception) {
            ExceptionHelper::objectNotFound($id, 'Case');
        }

        return $cluster;
    }

    /**
     * @param int $id
     * @param bool $exception
     * @return Cases
     * @throws ApiException
     */
    static function findActive(int $id, bool $exception = true): object
    {
        $cluster = Cases::query()->where('id', $id)->where('active', 1)->with('cluster')->with('city')->first();

        if (!$cluster && $exception) {
            ExceptionHelper::objectNotFound($id, 'Cluster');
        }

        return $cluster;
    }

    /**
     * @param Cluster $template
     * @return Cluster|bool
     */
    static function save(mixed $template): Cases
    {

        $case = isset($template->id)
            ? ($new = self::find($template->id, false)) ?? new Cases()
            : new Cases();


        $case->id = $template->id ?? $case->id;
        $case->name = $template->name ?? $case->name;
        $case->description = $template->description ?? $case->description;
        $case->cluster_id = $template->cluster_id ?? $case->cluster_id;
        $case->city_id = $template->city_id ?? $case->city_id;
        $case->latitude = (double)$template->latitude ?? $case->latitude;
        $case->longitude = (double)$template->longitude ?? $case->longitude;
        $case->location = $template->location ?? $case->location;
        $case->image_main_path = $template->image_main_path ?? $case->image_main_path;
        $case->active = $template->active ?? $case->active ?? true;

        if (!isset($new)) {
            $case->aliasGeneration();
            CityORM::find($case->city_id);
            ClusterORM::find($case->cluster_id);
        }

        $case->save();

        return $case;
    }

    static function saveMainImages(Cases $templete, mixed $image): Cases|null
    {
        if (!$image) {
            return null;
        }

        $alias = $templete->alias;

        if ($image->isValid()) {
            $filename = str_replace(' ', '_', $image->getClientOriginalName());
            $path = $image->storeAs("images/cases/$alias/first", $filename, 'public');
        }

        $templete->image_main_path = $path ?? null;

        return self::save($templete);
    }

    static function saveSecondImages(Cases $templete, ?array $images): Cases|null
    {
        if (!$images) {
            return null;
        }

        $alias = $templete->alias;

        $templete->dropSecondImg();

        foreach ($images as $image) {
            if ($image->isValid()) {
                $filename = str_replace(' ', '_', $image->getClientOriginalName());
                $path = $image->storeAs("images/cases/$alias/second", $filename, 'public');
                $templete->saveSecondImg($path);
            }
        }

        return self::save($templete);
    }


    static function delete(int $id): void
    {
        $cluster = self::find($id);
        $cluster->delete();
    }

    static function deactivate(int $id): Cases|bool
    {
        $cluster = self::find($id);
        $cluster->active = false;

        return self::save($cluster);
    }

    static function activate(int $id): Cases|bool
    {
        $cluster = self::find($id);
        $cluster->active = true;

        return self::save($cluster);
    }

    public static function listByCity(int $cityId): object
    {
        return Cases::query()->where('active', 1)->where('city_id', $cityId)->get();
    }

    public static function listByCluster(int $clusterId): object
    {
        return Cases::query()->where('cluster_id', $clusterId)->get();
    }

    public static function search(string $search)
    {
//        $search = str_replace(' ', '%', $search);
//        return Cases::query()
//            ->whereRaw("CONCAT_WS(' ', name, alias, description) REGEXP ?", [$search])
//            ->orWhereHas('city', function ($query) use ($search) {
//                $query->where('name', 'like', '%' . $search . '%');
//            })
//            ->orWhereHas('cluster', function ($query) use ($search) {
//                $query->where('name', 'like', '%' . $search . '%');
//            })
//            ->get();
//        return Cases::query()
//            ->where('active', 1)
//            ->where('name', 'like', '%' . $search . '%')
//            ->orWhereHas('city', function ($query) use ($search) {
//                $query->where('name', 'like', '%' . $search . '%');
//            })
//            ->orWhereHas('cluster', function ($query) use ($search) {
//                $query->where('name', 'like', '%' . $search . '%');
//            })
//            ->get();
        return Cases::query()
            ->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere(function (Builder $query) use ($search) {
                        $query->where('active', true) // Добавляем условие активности
                        ->whereHas('city', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                    })
                    ->orWhere(function (Builder $query) use ($search) {
                        $query->where('active', true) // Добавляем условие активности
                        ->whereHas('cluster', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                    });
            })
            ->get();
    }

}
