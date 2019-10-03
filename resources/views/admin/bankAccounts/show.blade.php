@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.bankAccount.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_title') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->account_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_type') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->account_type->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Account Signatory
                                    </th>
                                    <td>
                                        @foreach($bankAccount->users as $id => $users)
                                            <span class="label label-info label-many">{{ $users->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->bank_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.branch_name') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->branch_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_opening_date') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->account_opening_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.balance') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->balance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_number') }}
                                    </th>
                                    <td>
                                        {{ $bankAccount->account_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection