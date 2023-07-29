<?php

namespace App\Services\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\CaseORM;
use App\Models\Cases;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CaseService implements UrbanService
{

    public function all(): Collection
    {
        return CaseORM::allActive();
    }


    public function show(int $id): Cases
    {
        return CaseORM::findActive($id);
    }

    public function save(Request $request): Cases
    {
//        $cluster = new Cluster();
//        $cluster->id = $request->id;
//        $cluster->name = $request->name;
//        $cluster->description = $request->description;
//
//        $cluster = CaseORM::save($cluster);
//
//        return $cluster;
    }

    public function active(int $id, string $active): Cases|bool
    {
        $act = 'act';
        $dec = 'dec';
        return match ($active) {
            $dec => CaseORM::deactivate($id),
            $act => CaseORM::activate($id),
            default => ExceptionHelper::actionIsNotAvailable($active),
        };
    }

}
