@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.bankAccount.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.bank-accounts.update", [$bankAccount->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('account_title') ? 'has-error' : '' }}">
                            <label for="account_title">{{ trans('cruds.bankAccount.fields.account_title') }}*</label>
                            <input type="text" id="account_title" name="account_title" class="form-control" value="{{ old('account_title', isset($bankAccount) ? $bankAccount->account_title : '') }}" required>
                            @if($errors->has('account_title'))
                                <p class="help-block">
                                    {{ $errors->first('account_title') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.account_title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('account_type_id') ? 'has-error' : '' }}">
                            <label for="account_type">{{ trans('cruds.bankAccount.fields.account_type') }}*</label>
                            <select name="account_type_id" id="account_type" class="form-control select2" required>
                                @foreach($account_types as $id => $account_type)
                                    <option value="{{ $id }}" {{ (isset($bankAccount) && $bankAccount->account_type ? $bankAccount->account_type->id : old('account_type_id')) == $id ? 'selected' : '' }}>{{ $account_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('account_type_id'))
                                <p class="help-block">
                                    {{ $errors->first('account_type_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users">{{ trans('cruds.bankAccount.fields.users') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="users[]" id="users" class="form-control select2" multiple="multiple" required>
                                @foreach($users as $id => $users)
                                    <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || isset($bankAccount) && $bankAccount->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <p class="help-block">
                                    {{ $errors->first('users') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.users_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label for="bank_name">{{ trans('cruds.bankAccount.fields.bank_name') }}*</label>
                            <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($bankAccount) ? $bankAccount->bank_name : '') }}" required>
                            @if($errors->has('bank_name'))
                                <p class="help-block">
                                    {{ $errors->first('bank_name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.bank_name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('branch_name') ? 'has-error' : '' }}">
                            <label for="branch_name">{{ trans('cruds.bankAccount.fields.branch_name') }}*</label>
                            <input type="text" id="branch_name" name="branch_name" class="form-control" value="{{ old('branch_name', isset($bankAccount) ? $bankAccount->branch_name : '') }}" required>
                            @if($errors->has('branch_name'))
                                <p class="help-block">
                                    {{ $errors->first('branch_name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.branch_name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('account_opening_date') ? 'has-error' : '' }}">
                            <label for="account_opening_date">{{ trans('cruds.bankAccount.fields.account_opening_date') }}*</label>
                            <input type="text" id="account_opening_date" name="account_opening_date" class="form-control date" value="{{ old('account_opening_date', isset($bankAccount) ? $bankAccount->account_opening_date : '') }}" required>
                            @if($errors->has('account_opening_date'))
                                <p class="help-block">
                                    {{ $errors->first('account_opening_date') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.account_opening_date_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('balance') ? 'has-error' : '' }}">
                            <label for="balance">{{ trans('cruds.bankAccount.fields.balance') }}</label>
                            <input type="number" id="balance" name="balance" class="form-control" value="{{ old('balance', isset($bankAccount) ? $bankAccount->balance : '') }}" step="1">
                            @if($errors->has('balance'))
                                <p class="help-block">
                                    {{ $errors->first('balance') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.balance_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                            <label for="account_number">{{ trans('cruds.bankAccount.fields.account_number') }}*</label>
                            <input type="text" id="account_number" name="account_number" class="form-control" value="{{ old('account_number', isset($bankAccount) ? $bankAccount->account_number : '') }}" required>
                            @if($errors->has('account_number'))
                                <p class="help-block">
                                    {{ $errors->first('account_number') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.bankAccount.fields.account_number_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection