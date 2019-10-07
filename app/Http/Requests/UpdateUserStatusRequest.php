<?php

namespace App\Http\Requests;

use App\UserStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'unique',
            ],
        ];
    }
}
