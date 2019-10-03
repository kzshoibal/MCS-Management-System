@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.projects.update", [$project->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.project.fields.title') }}*</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($project) ? $project->title : '') }}" required>
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                            <label for="start_date">{{ trans('cruds.project.fields.start_date') }}*</label>
                            <input type="text" id="start_date" name="start_date" class="form-control date" value="{{ old('start_date', isset($project) ? $project->start_date : '') }}" required>
                            @if($errors->has('start_date'))
                                <p class="help-block">
                                    {{ $errors->first('start_date') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.start_date_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                            <label for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
                            <input type="text" id="end_date" name="end_date" class="form-control date" value="{{ old('end_date', isset($project) ? $project->end_date : '') }}">
                            @if($errors->has('end_date'))
                                <p class="help-block">
                                    {{ $errors->first('end_date') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.end_date_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('buget') ? 'has-error' : '' }}">
                            <label for="buget">{{ trans('cruds.project.fields.buget') }}*</label>
                            <input type="number" id="buget" name="buget" class="form-control" value="{{ old('buget', isset($project) ? $project->buget : '') }}" step="0.01" required>
                            @if($errors->has('buget'))
                                <p class="help-block">
                                    {{ $errors->first('buget') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.buget_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users">{{ trans('cruds.project.fields.users') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="users[]" id="users" class="form-control select2" multiple="multiple" required>
                                @foreach($users as $id => $users)
                                    <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || isset($project) && $project->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <p class="help-block">
                                    {{ $errors->first('users') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.users_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.project.fields.status') }}*</label>
                            <select name="status_id" id="status" class="form-control select2" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ (isset($project) && $project->status ? $project->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_id'))
                                <p class="help-block">
                                    {{ $errors->first('status_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                            <textarea id="description" name="description" class="form-control ">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
                            @if($errors->has('description'))
                                <p class="help-block">
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.project.fields.description_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('bank_account_id') ? 'has-error' : '' }}">
                            <label for="bank_account">{{ trans('cruds.project.fields.bank_account') }}</label>
                            <select name="bank_account_id" id="bank_account" class="form-control select2">
                                @foreach($bank_accounts as $id => $bank_account)
                                    <option value="{{ $id }}" {{ (isset($project) && $project->bank_account ? $project->bank_account->id : old('bank_account_id')) == $id ? 'selected' : '' }}>{{ $bank_account }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_account_id'))
                                <p class="help-block">
                                    {{ $errors->first('bank_account_id') }}
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