<?php

namespace App\Http\ORM\Urban;

use App\Http\ORM\iUrbanORM;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityORM implements iUrbanORM
{

    static function all(): Collection
    {
        return City::all();
    }

    static function allActive(): Collection
    {
        return City::query()->where('active', 1)->get();
    }

    static function find(int $id): ?City
    {
        return City::find($id);
    }

    static function findActive(int $id)
    {
        return City::query()->where('id', $id)->where('active', 1)->first();
    }

    /**
     * @param City $template
     * @return City|bool
     */
    static function save(mixed $template): City|bool
    {
        $templateId = $template
            ? $template->id
            : null;
        if (!$templateId)
            return false;
        $city = $templateId
            ? self::find($template->id) ?? new City()
            : new City();

        $city->id = $template->id ?? $city->id;
        $city->name = $template->name ?? $city->name;
            $city->id ?? $city->aliasGeneration();
        $city->description = $template->description ?? $city->description;
        $city->latitude = $template->latitude ?? $city->latitude;
        $city->longitude = $template->longitude ?? $city->longitude;
        $city->location = $template->location ?? $city->location;
        $city->active = $template->active ?? $city->active ?? true;
        $city->save();

        return $city;
        //формировать алиас с названия
        // добавить сохранение файлов в директорию public/storage/images/cities/alias/img.jpj
    }

    static function saveImages(mixed $templete)
    {

    }

    static function delete(int $id): void
    {
        self::find($id)->delete();
    }

    /**
     * @param int $id
     * @return City
     */
    static function deactivate(int $id): City|bool
    {
        $city = self::find($id);
        $city->active = false;

        return self::save($city);
    }

    /**
     * @param int $id
     * @return City
     */
    static function activate(int $id): City|bool
    {
        $city = self::find($id);
        $city->active = true;

        return self::save($city);
    }

}
