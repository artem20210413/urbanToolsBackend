<?php

namespace App\Http\ORM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface iORM
{
    static function all(): Collection;

    static function find(int $id);

    static function save(mixed $template): mixed;

    static function delete(int $id): void;

}
