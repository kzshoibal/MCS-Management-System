@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.email_verified_at') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        {{ $user->email_verified_at }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>
                                        Roles
                                    </th>
                                    <td>
                                        @foreach($user->roles as $id => $roles)
                                            <span class="label label-info label-many">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
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
{{--                                        {{ App\User::GENDER_RADIO[$user->gender] }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.about') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        {!! $user->about !!}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.address') }}--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        {!! $user->address !!}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.user_status') }}
                                    </th>
                                    <td>
{{--                                        {{ $user->user_status->title ?? '' }}--}}
                                        @if($user->status == true)
                                            <p class="helper-block">
                                                {{ "Active" }}
                                            </p>
                                        @else
                                            <p class="helper-block">
                                                {{ "Inactive" }}
                                            </p>{{""}}
                                        @endif
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
