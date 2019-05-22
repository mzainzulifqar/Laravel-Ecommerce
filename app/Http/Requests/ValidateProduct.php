<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'title' => 'required',
            'slug' => 'required|unique:products,slug',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'status' => 'required',
            'category' => 'required',
            'thumbnail' => 'required|max:2048|mimes:jpeg,jpg,png'
        ];
    }
}
