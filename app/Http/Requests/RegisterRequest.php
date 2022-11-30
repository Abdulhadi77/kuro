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
            'email' => 'required|unique|email',
            'password' => 'required',
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'confirm-password' =>'required_with:password|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'email is already used',
            'email.email' => 'email is not correct form',
            'password.required' => 'password is required',
            'name.required' => 'name is required',
            'age.required' => 'age is required',
            'phone.required' => 'phone is required',
            'confirm-password.required' => 'confirm-password is required',
        ];
    }
}
