@extends('layouts.admin')
@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            Add Monthly Deposit
        </h1>
        <ol class="breadcrumb">
            <li ><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route ("admin.enrole-monthly-deposits.index") }}">Deposit List</a></li>
            <li class="active"><a href="#">Add Monthly Deposit</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ "Deposit Information" }}
                    </div>
                    <div class="panel-body">

                        <form action="{{ route("admin.monthly-deposits.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
{{--                            Deposit Image--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Monthly Deposit Slip Image</b></label>
                                        <input type="file" class="form-control" name="deposit_image" id="deposit_image">
                                    </div>
                                </div>
                                <div class="col-lg-6"><br>
                                    {{--                            Bank Account Id--}}
                                    <div class="form-group {{ $errors->has('bank_account_id') ? 'has-error' : '' }}">
                                        <label for="bank_account">{{ "Bank Account" }}</label>
                                        <select name="bank_account_id" id="bank_account" class="form-control select2">
                                            @foreach($bank_accounts as $id => $bank_account)
                                                <option value="{{ $id }}" {{ (isset($deposits) && $deposits->bank_account_id ? $deposits->bank_account_id : old('bank_account_id')) == $id ? 'selected' : '' }}>{{ $bank_account }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('bank_account_id'))
                                            <p class="help-block">
                                                {{ $errors->first('bank_account_id') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
{{--                            Deposit Amount and Date--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                                        <label for="amount">{{ "Amount" }}*</label>
                                        <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($deposits) ? $deposits->amount : '') }}" step="0.01" required>
                                        @if($errors->has('amount'))
                                            <p class="help-block">
                                                {{ $errors->first('amount') }}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                        <label for="date">{{ "Deposit Date" }}*</label>
                                        <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($deposits) ? $deposits->date : '') }}" required>
                                        @if($errors->has('date'))
                                            <p class="help-block">
                                                {{ $errors->first('date') }}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">{{ "Notes"}}</label>
                                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($deposits) ? $deposits->description : '') }}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.project.fields.description_helper') }}
                                </p>
                            </div>
{{--                            Hidden content--}}
{{--                            Deposited by (user_id)--}}
                            <input id="deposited_by" name="deposited_by" type="hidden" value={{$user->id}}>

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
