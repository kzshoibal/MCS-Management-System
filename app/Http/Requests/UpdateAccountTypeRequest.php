<?php

namespace App\Http\Requests;

use App\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('account_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'unique:account_types,title,' . request()->route('account_type')->id,
            ],
        ];
    }
}
