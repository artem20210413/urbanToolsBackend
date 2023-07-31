<?php

namespace App\Http\Requests;

use App\Http\ORM\Urban\CityORM;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        $request = $this->id !== null && !(CityORM::find($this->id, false)) || $this->id === null ? 'required' : '';
        $id = $this->id ? ',' . $this->id : '';

        return [
            'id' => 'integer',
            'name' => "$request|string|max:256|unique:cities,name" . $id . ',id',
            'description' => "$request|string|max:1024",
            'latitude' => "$request|numeric",
            'longitude' => "$request|numeric",
            'location' => "$request|string|max:256",
            'image' => "$request|image|max:5120",
        ];
    }
}
