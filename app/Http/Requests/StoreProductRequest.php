<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|max:120|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|max:9999',
            'is_active' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es requerido.',
            'price' => 'required',
            'quantity' => 'required',
            'is_active' => 'nullable'
        ];
    }
}
