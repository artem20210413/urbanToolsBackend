<?php

namespace App\Http\Requests;

use App\Http\ORM\Urban\CaseORM;
use Illuminate\Foundation\Http\FormRequest;

class CaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $request = $this->id !== null && !(CaseORM::find($this->id, false)) || $this->id === null ? 'required' : '';
        $id = $this->id ? ',' . $this->id : '';

        return [
            'id' => 'integer',
            'name' => "$request|string|max:256|unique:cases,name" . $id . ',id',
            'description' => "$request|string|max:1024",
            'cluster_id' => "$request|exists:clusters,id",
            'city_id' => "$request|exists:cities,id",
            'latitude' => "$request|numeric",
            'longitude' => "$request|numeric",
            'location' => "$request|string|max:256",
            'imageMain' => "$request|image|max:5120",
            'images.*' => "$request|image|max:5120",
        ];
    }
}
