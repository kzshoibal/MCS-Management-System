<?php

namespace App\Http\Requests;

use App\BankAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bank_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'account_title'        => [
                'required',
                'unique:bank_accounts,account_title,' . request()->route('bank_account')->id,
            ],
            'account_type_id'      => [
                'required',
                'integer',
            ],
            'users.*'              => [
                'integer',
            ],
            'users'                => [
                'required',
                'array',
            ],
            'bank_name'            => [
                'required',
            ],
            'branch_name'          => [
                'required',
            ],
            'account_opening_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'balance'              => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'account_number'       => [
                'required',
                'unique:bank_accounts,account_number,' . request()->route('bank_account')->id,
            ],
        ];
    }
}
