<?php

namespace App\Services\Urban;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\CityORM;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface UrbanService
{

    public function all(): mixed;

    public function show(int $id): mixed;

    public function save(Request $request): mixed;

    public function active(int $id, string $active): mixed;

}
