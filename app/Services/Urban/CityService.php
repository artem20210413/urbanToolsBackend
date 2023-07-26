<?php

namespace App\Services\Urban;

use App\Http\ORM\Urban\CityORM;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CityService
{

    public function all(): Collection
    {
        return CityORM::allActive();
    }

    public function show(int $id): ?City
    {
        return CityORM::findActive($id);
    }

    public function save(Request $request): City
    {
//        dd($request->all());
        $image = $request->image;
        $city = new City();
        $city->name = $request->name;
        $city->description = $request->description;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;
        $city->location = $request->location;
        $city = CityORM::save($city);
//        dd($city);
        $city = CityORM::saveImages($city, $image)??$city;

        return $city;
    }

}
