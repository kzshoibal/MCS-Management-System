@extends('layouts.admin')
{{--@section('content')--}}
{{--{{"notice id: " . $notice->title}}--}}
{{--@endsection--}}
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.show') }} {{ trans('cruds.notice.title') }}
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notice.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $notice->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notice.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $notice->title }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Author
                                    </th>
                                    <td>
{{--                                        {{ Auth::user()->id }}--}}
                                        <span class="label label-info label-many">{{ Auth::user()->name }}</span>
{{--                                        @foreach($project->users as $id => $users)--}}
{{--                                            <span class="label label-info label-many">{{ Auth::user()->name }}</span>--}}
{{--                                        @endforeach--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notice.fields.status') }}
                                    </th>
                                    <td>
{{--                                        {{ $project->status->title ?? '' }}--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notice.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $notice->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notice.fields.contents') }}
                                    </th>
                                    <td>
                                        {!! $notice->contents !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
