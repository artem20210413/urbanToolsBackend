<?php

namespace App\Services\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\CityORM;
use App\Models\City;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CityService implements UrbanService
{

    public function all(): Collection
    {
        return CityORM::allActive();
    }

    public function show(int $id): ?City
    {
        return CityORM::findActive($id);
    }

    /**
     * @param Request $request
     * @return City
     */
    public function save(ValidatesWhenResolved $request): City
    {
//        dd($request->all());
        $image = $request->image;
        $city = new City();
        $city->id = $request->id;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;
        $city->location = $request->location;
        $city = CityORM::save($city);
//        dd($city);
        $city = CityORM::saveImages($city, $image) ?? $city;

        return $city;
    }

    public function active(int $id, string $active): City|bool
    {
        $act = 'act';
        $dec = 'dec';
        switch ($active) {
            case $dec:
                return CityORM::deactivate($id);
            case $act:
                return CityORM::activate($id);

            default:
                throw new ApiException('Action is not available: $active', 0, 422);
        }
    }

}
