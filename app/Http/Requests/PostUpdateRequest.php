<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => [
                'alpha_dash',
                'required'
            ],
            'category_id' => ['required'],
            'content' => ['required'],
            'short_description' => ['required'],
            'thumbnail' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'category_id' => 'category'
        ];
    }
}
