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

        $imgMain = $request->imgMain;
        $img = $request->img;

        $case = new Cases();
        $case->id = $request->id;
        $case->name = $request->name;
        $case->description = $request->description;
        $case->cluster_id = $request->cluster_id;
        $case->city_id = $request->city_id;
        $case->latitude = $request->latitude;
        $case->longitude = $request->longitude;
        $case->location = $request->location;
        $case = CaseORM::save($case);
        CaseORM::saveMainImages($case, $imgMain);
        CaseORM::saveSecondImages($case, $img);

        return $case;
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
