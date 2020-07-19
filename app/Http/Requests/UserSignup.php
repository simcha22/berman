<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest
{
    
    public function rules()
    {
        return [
            'name'=>'Required|min:2|max:90',
            'email'=>'Required|email',
            'password'=>''
            
        ];
    }
    
    public function messages(){
        return [
            
        ];
    }
}
