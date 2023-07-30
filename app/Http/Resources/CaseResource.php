<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CaseResource extends MainResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        foreach ($this->images as $image) {
            $images[] = $this->image_main_path ? asset('storage/' . $image->image_paths) : null;
        }

//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'location' => $this->location,
            'image_main_path' => $this->image_main_path ? asset('storage/' . $this->image_main_path) : null,
            'active' => (bool)$this->active,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
            'cluster' => new ClusterResource($this->cluster),
            'city' => new CityResource($this->city),
            'images' => $images,
        ];
    }
}
