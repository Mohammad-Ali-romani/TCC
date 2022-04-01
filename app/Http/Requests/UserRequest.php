<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // 'name'=>'required|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            // 'phone'=>'required|unique:users,phone',
            'phone'=>''
            

        ];
    }

    public function messages()
    {
        return[
            // 'name.required'=>__('messages.name is required'),
            // 'name.max'=>__('messages.maximum character limit for name is 100'),
            'email.required'=>__('messages.email is required'),
            'email.email'=>__('messages.email should be in email format'),
            'email.unique'=>__('messages.email must be unique'),
            'password.required'=>__('messages.password is required'),
            'password.min'=>__('messages.minimum limit character limit for password is 6'),
            // 'phone.required'=>__('messages.phone is required'),
            // 'phone.unique'=>__('messages.phone must be unique'),
        ];
    }
}
