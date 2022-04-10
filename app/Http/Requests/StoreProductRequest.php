<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article' => 'required|min:5',
            'name' => 'required|min:5',
            'status' => [
                'required',
                Rule::in(['available', 'unavailable'])
            ],
            'data' => 'nullable|array'
        ];
    }
}
