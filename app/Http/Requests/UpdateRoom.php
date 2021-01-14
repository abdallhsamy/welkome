<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoom extends FormRequest
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
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:1|max:999999',
            'is_suite' => 'required|in:0,1',
            'min_price' => 'required|numeric|lte:price',
            'capacity' => 'required|integer|min:1|max:12',
            'tax_status' => 'required|in:0,1,2',
            'tax' => 'nullable|numeric|min:0.01|max:0.5'
        ];
    }
}
