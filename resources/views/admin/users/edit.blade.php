@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.password_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.roles_helper') }}
                            </p>
                        </div>
{{--                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">--}}
{{--                            <label for="image">{{ trans('cruds.user.fields.image') }}</label>--}}
{{--                            <div class="needsclick dropzone" id="image-dropzone">--}}

{{--                            </div>--}}
{{--                            @if($errors->has('image'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('image') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                            <p class="helper-block">--}}
{{--                                {{ trans('cruds.user.fields.image_helper') }}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">--}}
{{--                            <label>{{ trans('cruds.user.fields.gender') }}</label>--}}
{{--                            @foreach(App\User::GENDER_RADIO as $key => $label)--}}
{{--                                <div>--}}
{{--                                    <input id="gender_{{ $key }}" name="gender" type="radio" value="{{ $key }}" {{ old('gender', $user->gender) === (string)$key ? 'checked' : '' }}>--}}
{{--                                    <label for="gender_{{ $key }}">{{ $label }}</label>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                            @if($errors->has('gender'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('gender') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">--}}
{{--                            <label for="about">{{ trans('cruds.user.fields.about') }}</label>--}}
{{--                            <textarea id="about" name="about" class="form-control ckeditor">{{ old('about', isset($user) ? $user->about : '') }}</textarea>--}}
{{--                            @if($errors->has('about'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('about') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                            <p class="helper-block">--}}
{{--                                {{ trans('cruds.user.fields.about_helper') }}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">--}}
{{--                            <label for="address">{{ trans('cruds.user.fields.address') }}</label>--}}
{{--                            <textarea id="address" name="address" class="form-control ">{{ old('address', isset($user) ? $user->address : '') }}</textarea>--}}
{{--                            @if($errors->has('address'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('address') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                            <p class="helper-block">--}}
{{--                                {{ trans('cruds.user.fields.address_helper') }}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
{{--                            <label for="user_status">{{ trans('cruds.user.fields.user_status') }}*</label>--}}
{{--                            <select name="user_status_id" id="user_status" class="form-control select2" required>--}}
{{--                                @foreach($user_statuses as $id => $user_status)--}}
{{--                                    <option value="{{ $id }}" {{ (isset($user) && $user->user_status ? $user->user_status->id : old('user_status_id')) == $id ? 'selected' : '' }}>{{ $user_status }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @if($errors->has('user_status_id'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('user_status_id') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">--}}
{{--                            <label>{{ trans('cruds.user.fields.user_status') }}</label>--}}
{{--                            @foreach(App\User::STATUS_RADIO as $key => $label)--}}
{{--                                <div>--}}
{{--                                    <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', $user->status) === (string)$key ? 'checked' : '' }}>--}}
{{--                                    <label for="status_{{ $key }}">{{ $label }}</label>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                            @if($errors->has('status'))--}}
{{--                                <p class="help-block">--}}
{{--                                    {{ $errors->first('status') }}--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <div>
                            <label>{{ trans('cruds.user.fields.user_status') }}</label>
                            <div>
                                @if($user->status == true)
                                    <p class="helper-block">
                                        {{ "Active" }}
                                    </p>
                                @else
                                    <p class="helper-block">
                                        {{ "Inactive" }}
                                    </p>{{""}}
                                @endif
                            </div>
                        </div>

                        <div>
                            <input class="btn btn-danger text-center" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->image)
      var file = {!! json_encode($user->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop
