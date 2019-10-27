<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'name'        => [
                'required',
            ],
            'email'       => [
                'required',
                'email',
            ],

//            'profile_image' =>  [
//                'image|max:2048'],

            'phone_number' =>[
                'required',
                'min:11',

            ],
            'nid_number' =>[
                'required',
                'integer',
                'min:8'
            ],
            'notes' =>[
                'max:100'
            ],
        ];
    }
}
