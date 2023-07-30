<?php

namespace App\Http\ORM\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\iUrbanORM;
use App\Models\Cases;
use App\Models\City;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;

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

//        $templateId = $template
//            ? $template->id
//            : null;

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

//dd($new, $case->toArray());
        if (!$new) {
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
            $filename = $image->getClientOriginalName();
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
                $filename = $image->getClientOriginalName();
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

}
