<?php

namespace App\Http\ORM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface iORM
{
    public function all(): Collection;

    public function find(int $id);

    public function findActive(int $id);

    public function save(mixed $template): mixed;

    public function delete(int $id): void;

    public function deactivate(int $id): mixed;

    public function activate(int $id): mixed;
}
