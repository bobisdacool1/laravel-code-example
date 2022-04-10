<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $product = Product::where('id', $this->input('id'))->first();

        $currentUserId = 1; // u can change that value. i dont have any authorization, so this is it

        if ($product->article !== $this->input('article')) {
            $currentUser = User::where('id', $currentUserId)->first();

            if (!$currentUser->hasPermissionTo('edit article'))
                return false;
        }
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
            'article' => "required|min:10|alpha_num|unique:products,article",
            'name' => 'required|min:10',
            'status' => [
                'required',
                Rule::in(['available', 'unavailable'])
            ],
            'data' => 'nullable|array'
        ];
    }
}
