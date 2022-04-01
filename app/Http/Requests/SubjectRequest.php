<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name'=>'required|max:254',           
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> __('messages.name is required'),
            'name.max'=> __('messages.maximum character limit for name is 254'),
        ];
    }
}
