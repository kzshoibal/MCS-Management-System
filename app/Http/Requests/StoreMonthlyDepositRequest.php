<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class StoreMonthlyDepositRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        abort_if(Gate::denies('monthly_deposit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'deposit_image' =>[
                'required',
                'image'
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'amount'      => [
                'required',
            ],
            'bank_account_id' => [
                'required',
            ],
        ];
    }
}
