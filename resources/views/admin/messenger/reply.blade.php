@extends('admin.messenger.template')

@section('title', trans('global.new_message'))

@section('messenger-content')

<div class="row">
    <div class="col-md-12">
        <form action="{{ route("admin.messenger.reply", [$topic->id]) }}" method="POST">
            @csrf
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="content" class="control-label">
                                {{ trans('global.content') }}
                            </label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="{{ trans('global.reply') }}" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</div>
@stop