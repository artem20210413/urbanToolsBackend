<?php

namespace App\Services\Urban;

use App\Helpers\ExceptionHelper;
use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\CaseORM;
use App\Models\Cases;
use App\Models\Cluster;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
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

    /**
     * @param Request $request
     * @return Cases
     */
    public function save(ValidatesWhenResolved $request): Cases
    {

        $imageMain = $request->imageMain;
        $images = $request->images;

//        dd($request->toArray(),$imageMain, $images);
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

        CaseORM::saveMainImages($case, $imageMain);
        CaseORM::saveSecondImages($case, $images);

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
