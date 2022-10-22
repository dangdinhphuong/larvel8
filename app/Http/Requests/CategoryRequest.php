<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'locale' => [
                'sometimes'
            ],
            'slug' => [
                'required',
                'alpha_dash',
                Rule::unique('category_translations')
                    ->ignore($this->category, 'category_id')
            ],
            'name' => [
                'required'
            ],
            'type' => [
                'required', 'integer'
            ],
            'parent_id' => []
        ];
    }
}
