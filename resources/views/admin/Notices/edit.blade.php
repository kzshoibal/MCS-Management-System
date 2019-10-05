@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.edit') }} {{ trans('cruds.notice.title_singular') }}
                    </div>
                    <div class="panel-body">

                        <form action="{{ route("admin.notice.update", [$notice->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">{{ trans('cruds.notice.fields.title') }}*</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($notice) ? $notice->title : '') }}" required>
                                @if($errors->has('title'))
                                    <p class="help-block">
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">{{ trans('cruds.notice.fields.description') }}</label>
                                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($notice) ? $notice->description : '') }}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('contents') ? 'has-error' : '' }}">
                                <label for="contents">{{ trans('cruds.notice.fields.contents') }}*</label>
                                <textarea id="contents" name="contents" class="form-control ckeditor">{{ old('contents', isset($notice) ? $notice->contents : '') }}</textarea>
                                @if($errors->has('contents'))
                                    <p class="help-block">
                                        {{ $errors->first('contents') }}
                                    </p>
                                @endif
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
