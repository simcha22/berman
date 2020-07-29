<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLogin extends FormRequest
{
    public function rules()
    {
        return [
            'email'=>'Required|email',
            'password'=>'Required|min:4',
        ];
    }

    public function messages(){
        return [
            'password.required'=> 'אנא הקלד את הסיסמא מעל 4 תוים.',
        ];
    }
}
