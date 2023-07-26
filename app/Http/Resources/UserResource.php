<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private ?string $token;

    public function __construct($resource, ?string $token = null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        return [
            'name' => $this->name,
            'token' => $this->token,
        ];
    }

    public function withResponse($request, $response)
    {
        // Get the data from the resource using toArray()
        $data = $this->toArray($request);

        // Set the data directly in the response, without the 'data' key
        $response->setData($data);
    }

    public function toPlainArray()
    {
        return $this->toArray(request());
    }
}
