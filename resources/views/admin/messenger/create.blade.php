@extends('admin.messenger.template')

@section('title', trans('global.new_message'))

@section('messenger-content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route("admin.messenger.storeTopic") }}" method="POST">
            @csrf
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-xs-12 form-group">
                            <label for="recipient" class="control-label">
                                {{ trans('global.recipient') }}
                            </label>
                            <select name="recipient" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="subject" class="control-label">
                                {{ trans('global.subject') }}
                            </label>
                            <input type="text" name="subject" class="form-control" />
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="content" class="control-label">
                                {{ trans('global.content') }}
                            </label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="{{ trans('global.submit') }}" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</div>
@stop