<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
                'required',
                Rule::unique('post_translations', 'slug')
                    ->ignore($this->post, 'post_id')
            ],
            'category_ids' => ['required', 'array'],
            'content' => ['required'],
            'short_description' => ['required'],
            'thumbnail' => ['required'],
        ];
    }
}
