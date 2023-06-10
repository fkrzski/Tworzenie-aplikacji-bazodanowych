<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateHeadquarterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city' => [
                'string',
                'required',
            ],
            'publisher_id' => [
                'numeric',
                'nullable',
            ]
        ];
    }
}
