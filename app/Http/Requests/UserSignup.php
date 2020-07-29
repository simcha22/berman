<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest
{

    public function rules()
    {
        return [
            'name'=>'Required|min:2|max:90',
            'email'=>'Required|email|unique:users,email',
            'password'=>'Required|min:4|confirmed',
        ];
    }

    public function messages(){
        return[
'name.required'=> 'אנא הקלד את השם הנכון.',
            'email.required'=> 'אנא הקלד כתובת אימיל נכונה.',
            'password.required'=> 'אנא הקלד את הסיסמא מעל 4 תוים.',
            'password.confirmed'=> 'אנא הקלד את הסיסמא השניה תואמת לסיסמא הראשונה.',
        ];
    }
}
