<?php

namespace App\Http\ORM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface iUrbanORM extends iORM
{
    public function allActive(): Collection;

    public function findActive(int $id);

    public function deactivate(int $id): mixed;

    public function activate(int $id): mixed;
}
