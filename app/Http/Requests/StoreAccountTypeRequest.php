<?php

namespace App\Http\Requests;

use App\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('account_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'unique:account_types',
            ],
        ];
    }
}
