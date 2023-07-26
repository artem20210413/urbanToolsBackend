<?php

namespace App\Http\ORM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface iUrbanORM extends iORM
{
    static function allActive(): Collection;

    static function findActive(int $id, bool $exception = true);

    static function deactivate(int $id): mixed;

    static function activate(int $id): mixed;
}
