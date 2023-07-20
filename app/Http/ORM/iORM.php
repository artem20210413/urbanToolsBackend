<?php

namespace App\Http\ORM;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface iORM
{
    public function all(): Collection;

    public function find(int $id);

    public function save(array $form);

    public function delete(int $id): void;
}
