<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageHandler extends FormRequest
{
    
    public function rules()
    {
        $unique = ($this->page) ? ',' . $this->page : '';

        return [
            'name' => 'required|min:2',
            'slug'=>'required|min:2|alpha_dash|unique:pages,slug' .$unique,
            'content'=>'required|min:6'
        ];
    }
}
