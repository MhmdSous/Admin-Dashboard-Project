<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

                'name_ar' => 'required|unique:products',
                'name_en' => 'required|unique:products',
                'product_image' => 'required|mimes:jpg,jpeg,png',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'description_ar' => 'required|max:4',
                'description_en' => 'required|max:4',

        ];
    }
    public function messages()
    {
        return[


                'name_ar.required' => __('message.required'),
                'name_en.required' => __('message.required'),
                'name_ar.unique'=>__('message.uniqueName'),
                'name_en.unique'=>__('message.uniqueName'),
                'store_id.required' => __('message.required'),
                'discount.numeric' => __('message.numeric'),
                'product_image.required'=>__('message.required'),
                'product_image.mimes'=>__('message.mimes'),
                'description_ar.required'=>__('message.required'),
                'description_en.required'=>__('message.required'),
                'discount.required'=>__('message.required'),
                'price.required'=>__('message.required'),


        ];
    }
}
