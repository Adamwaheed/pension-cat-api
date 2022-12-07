<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bread_name'=>'required|string|unique:cats',
            'lifespan'=>'required|string',
            'avg_weight_female'=>'required|integer|max:100|min:0.1',
            'avg_weight_male'=>'required|integer|max:100|min:0.1',
            'coat_type'=>'required|string|in:none,short,medium,long',
            'coat_density'=>'required|string|in:low,medium,high',

        ];
    }

    public function messages()
    {
        return [
            'coat_type.in' => 'Coat Tye Must be , none , short, medium or long',
            'coat_density.in' => 'Coat Tye Must be , Low , medium, or high',
        ];
    }


}
