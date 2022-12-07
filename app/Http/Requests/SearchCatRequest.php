<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchCatRequest extends FormRequest
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
            'bread_name'=>'sometimes|string|unique:cats',
            'lifespan'=>'sometimes|string',
            'avg_weight_female'=>'sometimes|integer|max:100|min:0.1',
            'avg_weight_male'=>'sometimes|integer|max:100|min:0.1',
            'coat_type'=>'sometimes|string|in:none,short,medium,long',
            'coat_density'=>'sometimes|string|in:low,medium,high',

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
