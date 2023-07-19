<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'name_en' => 'required|unique:stores',
            'name_ar' => 'unique:stores',
            'store_image' => 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required',
            'details_en'=>'required',


        ];
    }
    public function messages()
    {
        return [
            'name_en.required' => __('message..required'),
            'details_en.required' => __('message..required'),
            'category_id.required' => __('message..required'),
            'store_image.required' => __('message..required'),
            'store_image.mimes' => __('message.mimes'),
            'name_en.unique'=>__('message.uniqueName'),
            'name_ar.unique'=>__('message.uniqueName'),
        ];
    }
}
