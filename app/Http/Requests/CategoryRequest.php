<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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


            'categoryName_en' => 'required|unique:categories|min:4',
            'categoryName_ar' => 'unique:categories',
            'image' => 'required|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'categoryName_en.required' => __('message..required'),
            'categoryName_en.min' => 'Category Longer Then 4Chars',
            'categoryName_en.unique' => __('message.uniqueName'),
            'categoryName_ar.unique' => __('message.uniqueName'),
            'image.required' => __('message..required'),
            'image.mimes' => __('message.mimes'),
        ];
    }
}
