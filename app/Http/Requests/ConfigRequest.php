<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConfigRequest extends FormRequest
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
            'key' => [
                'required',
                Rule::unique('configs', 'key')
                    ->ignore($this->config, 'id')
            ],
            'type' => [],
            'value-image' => [
                'required_if:type,image'
            ],
            'value-flat' => [
                'required_if:type,flat'
            ],
            'value-textarea' => [
                'required_if:type,textarea'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'value-image' => __('admin.page.config.attribute.value'),
            'value-flat' => __('admin.page.config.attribute.value'),
            'value-textarea' => __('admin.page.config.attribute.value'),
        ];
    }

    public function messages()
    {
        return [
            'value-image.required_if' => __('validation.required', [__('admin.page.config.attribute.value')]),
            'value-flat.required_if' => __('validation.required', [__('admin.page.config.attribute.value')]),
            'value-textarea.required_if' => __('validation.required', [__('admin.page.config.attribute.value')]),
        ];
    }
}
