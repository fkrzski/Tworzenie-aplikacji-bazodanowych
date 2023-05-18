<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'isbn' => [
                'string',
                'required',
                'unique:books,isbn'.(request()->route('book')?->id ? ','.request()->route('book')->id: ''),
            ],
            'author_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'publisher_id' => [
                'required',
                'integer',
            ],
            'publication_year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'numeric',
                'required',
            ],
            'in_stock' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
