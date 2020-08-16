<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryHandler extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'slug'=>'required|min:2|alpha_dash|unique:categories,slug',
            'image' =>'required|image',
            //|regex:/^[\d\w -]+$/
        ];
    }
}
