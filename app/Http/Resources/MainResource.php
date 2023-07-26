<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function withResponse($request, $response): void
    {
        // Get the data from the resource using toArray()
        $data = $this->toArray($request);

        // Set the data directly in the response, without the 'data' key
        $response->setData($data);
    }

}
