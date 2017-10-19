<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
            're_password' => 'required|min:6|max:50'
        ];
    }

     public function messages()
    {
        return [
            'name' => 'The name field is required',
            'email' => 'The email field is required',
            'password' => 'The password field is required',
            're_password' => 'The re_password field is required'
        ];
    }
}
