<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QaTopicCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recipient' => 'required',
            'subject'   => 'required',
            'content'   => 'required',
        ];
    }
}
