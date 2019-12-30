<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            //'post_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The field title is required!',
            'description.required' => 'The field  description is required!',
            'title.min' => 'Please, enter at least 10 characters!',
        ];
    }
}
