@extends('layouts.admin')
@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            Monthly Deposit Details
        </h1>
        <ol class="breadcrumb">
            <li ><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route ("admin.monthly-deposits.index") }}">Deposit List</a></li>
            <li class="active"><a href="#">Monthly Deposit Details</a></li>
        </ol>
    </section>
@endsection
{{--@section('content')--}}
{{--    <div class="container-fluid">--}}
{{--        <!-- A fluid container that uses the full witdh -->--}}
{{--    </div>--}}
{{--    @endsection--}}
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-7">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ "Information Detail" }}</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $depositDetail->id ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Deposit Amount" }}
                                    </th>
                                    <td>
                                        {{ $depositDetail->amount ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Date" }}
                                    </th>
                                    <td>
                                        {{ $depositDetail->date ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Deposited By" }}
                                    </th>
                                    <td>
                                        @if($depositDetail->deposited_by)
                                            <a href="{{ route('admin.profile.show', $depositDetail->depositedBy->id) }}" target="_blank">
                                                {{$depositDetail->depositedBy->name ?? ''}}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Bank Account Name"}}
                                    </th>
                                    <td>
                                        {{$depositDetail->bank_account->account_title ?? ''}}

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Bank Account Number"}}
                                    </th>
                                    <td>
                                        {{$depositDetail->bank_account->account_number ?? ''}}

                                    </td>
                                </tr>
                                <tr>
                                    <th>

                                        {{"Approval Status"}}
                                    </th>
                                    <td>
{{--                                        approved request--}}
                                        @if($depositDetail->is_approved == 1)
                                            <span class="label label-success label-many">{{ "Approved" }}</span>
{{--                                            Pending Request--}}
                                        @elseif($depositDetail->is_approved == 0)
                                            <span class="label label-warning label-many" >{{ "Pending" }}</span>
{{--                                            Rejected Request--}}
                                        @elseif($depositDetail->is_approved == 2)
                                            <span class="label label-danger label-many" >{{ "Rejected" }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        @if($depositDetail->is_approved == 1)
                                            {{"Approved By"}}
                                        @elseif($depositDetail->is_approved == 2)
                                            {{"Rejected By"}}

                                        @endif
                                    </th>
                                    <td>
                                        @if(isset($approvedUser))
                                        <a href="{{ route('admin.profile.show', $approvedUser->id) }}" target="_blank">
                                            {{$approvedUser->name ?? ''}}
                                        </a>
                                            @endif

                                    </td>
                                </tr>
                                </tbody>
                            </table>
{{--                            if the approval status is pending then this button will appeared.--}}

                            @if($depositDetail->is_approved == 0) {{-- Status for pending --}}
                                <div class="text-center">
                                    <a class="btn btn-success" href="{{ route('admin.monthly-deposits.approve', $depositDetail->id) }}">
                                        {{ 'Approve' }}
                                    </a>
                                    <a class="btn btn-danger" href="{{ route('admin.monthly-deposits.reject', $depositDetail->id) }}">
                                        {{ 'Reject' }}
                                    </a>
                                </div>
                                @endif


                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
{{--                            <a style="margin-top:20px;" class="btn btn-default justify-content-center" href="{{ url()->previous() }}">--}}
{{--                                {{ trans('global.back_to_list') }}--}}
{{--                            </a>--}}
{{--                            <div class="wrapper">--}}
{{--                                <button class="button">Button</button>--}}
{{--                            </div>--}}

                        </div>
{{--                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">--}}
{{--                            {{ trans('global.back_to_list') }}--}}
{{--                        </a>--}}

                        <ul class="nav nav-tabs">

                        </ul>
                        <div class="tab-content">

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-5">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deposit Slip Image</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if($depositDetail->deposit_image)
                            <a href="{{ asset($depositDetail->deposit_image) }}" target="_blank">
                                <img src="{{ asset($depositDetail->deposit_image)}}" width="500px" height="500px">
                            </a>
                        @endif
                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p class="text-muted">
                            {{ $depositDetail->description }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
    </div>
@endsection
