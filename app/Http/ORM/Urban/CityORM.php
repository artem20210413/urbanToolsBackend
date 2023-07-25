<?php

namespace App\Http\ORM\Urban;

use App\Http\ORM\iUrbanORM;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityORM implements iUrbanORM
{

    public function all(): Collection
    {
        return City::all();
    }

    public function allActive(): Collection
    {
        return City::query()->where('active', 1)->get();
    }

    public function find(int $id): ?City
    {
        return City::find($id);
    }

    public function findActive(int $id)
    {
        return City::query()->where('id', $id)->where('active', 1)->first();
    }

    public function save(mixed $template): mixed
    {
        // TODO: Implement save() method.
        // добавить сохранение файлов в директорию public/storage/images/cities/alias/img.jpj
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    public function deactivate(int $id): mixed
    {
        // TODO: Implement deactivate() method.
    }

    public function activate(int $id): mixed
    {
        // TODO: Implement activate() method.
    }

}
