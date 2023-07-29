<?php

namespace App\Http\ORM\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\ORM\iUrbanORM;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\File;

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

    static function find(int $id, bool $exception = true): ?City
    {
        $city = City::find($id);

        if (!$city && $exception) {
            ExceptionHelper::objectNotFound($id, 'City');
        }

        return $city;
    }

    /**
     * @param int $id
     * @return null|City
     */
    static function findActive(int $id, bool $exception = true): mixed
    {
        $city = City::query()->where('id', $id)->where('active', 1)->first();
        if (!$city && $exception) {
            ExceptionHelper::objectNotFound($id, 'City');
        }

        return $city;
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
        if (!$template)
            return false;
        $city = $templateId
            ? self::find($template->id, false) ?? new City()
            : new City();

        $city->id = $template->id ?? $city->id;
        $city->name = $template->name ?? $city->name;
            $city->id ?? $city->aliasGeneration();
        $city->description = $template->description ?? $city->description;
        $city->latitude = $template->latitude ?? $city->latitude;
        $city->longitude = $template->longitude ?? $city->longitude;
        $city->location = $template->location ?? $city->location;
        $city->image_main_path = $template->image_main_path ?? $city->image_main_path;
        $city->active = $template->active ?? $city->active ?? true;
        $city->save();

        return $city;
        //формировать алиас с названия
        // добавить сохранение файлов в директорию public/storage/images/cities/alias/img.jpj
    }

    /**
     * @param City $templete
     * @param File $image
     * @return City|null
     */
    static function saveImages(mixed $templete, mixed $image): City|null
    {
        if (!$image) {
            return null;
        }

        $alias = $templete->alias;

        if ($image->isValid()) {
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs("images/cities/$alias", $filename, 'public');
        }
        $templete->image_main_path = $path ?? null;

        return self::save($templete);
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
