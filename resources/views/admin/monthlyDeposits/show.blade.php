@extends('layouts.admin')
@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            Monthly Deposit Details
        </h1>
        <ol class="breadcrumb">
            <li ><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route ("admin.enrole-monthly-deposits.index") }}">Deposit List</a></li>
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
                                        {{ $depositDetail->id }}
{{--                                        {{ "fdkfjdksfjdksfjdksf dsjfkdsj fkdjsk dskfjdskf ksdf " }}--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Deposit Amount" }}
                                    </th>
                                    <td>
                                        {{ $depositDetail->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Date" }}
                                    </th>
                                    <td>
                                        {{ $depositDetail->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ "Deposited By" }}
                                    </th>
                                    <td>
                                        {{--  s{{ $user->email_verified_at }}--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Bank Account Name"}}
                                    </th>
                                    <td>
{{--                                        @foreach($user->roles as $id => $roles)--}}
{{--                                            <span class="label label-info label-many">{{ $roles->title }}</span>--}}
{{--                                        @endforeach--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Bank Account Number"}}
                                    </th>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Approval Status"}}
                                    </th>
                                    <td>
                                        @if($depositDetail->is_approved)
                                            <span class="label label-success label-many">{{ "Approved" }}</span>
                                        @elseif($depositDetail->is_approved == 0)
                                            <span class="label label-warning label-many" >{{ "Pending" }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{"Approved By"}}
                                    </th>
                                    <td>
                                        {{"$depositDetail->approved_by"}}

                                    </td>
                                </tr>
{{--                                Image--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.image') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        @if($user->image)--}}
{{--                                            <a href="{{ $user->image->getUrl() }}" target="_blank">--}}
{{--                                                <img src="{{ $user->image->getUrl('thumb') }}" width="50px" height="50px">--}}
{{--                                            </a>--}}
{{--                                        @endif--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.gender') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        --}}{{--                                                                        {{ App\User::GENDER_RADIO[$user->gender] }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.about') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        --}}{{--                                                                        {!! $user->about !!}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.address') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        --}}{{--                                                                        {!! $user->address !!}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.user_status') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                                                                {{ $user->user_status->title ?? '' }}--}}
{{--                                        @if($user->status == true)--}}
{{--                                            <p class="helper-block">--}}
{{--                                                {{ "Active" }}--}}
{{--                                            </p>--}}
{{--                                        @else--}}
{{--                                            <p class="helper-block">--}}
{{--                                                {{ "Inactive" }}--}}
{{--                                            </p>{{""}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}

{{--                                </tr>--}}
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
