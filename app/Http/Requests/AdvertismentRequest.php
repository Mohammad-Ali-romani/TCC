<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertismentRequest extends FormRequest
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
            'title'=>'required|max:100',
            'description'=>'max:254',
            'file'=>'file|max:30720|mimes:png,jpg,bmp,pdf',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>__('messages.title is required'),
            'title.max'=>__('messages.maximum character limit for title is 100'),
            'file.file'=>__('messages.this format is not file'),
            'file.max'=>__('messages.maximum size limit for file is 30mb'),
            'file.mimes'=>__('messages.the file of type must be pdf , png , bmp , jpg'),
            'description'=>__('messages.maximum character limit for description is 254')
        ];
    }
}
