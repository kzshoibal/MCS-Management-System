@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('user_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.email_verified_at') }}--}}
{{--                                    </th>--}}
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.gender') }}--}}
{{--                                    </th>--}}
{{--                                    <th>--}}
{{--                                        {{ trans('cruds.user.fields.address') }}--}}
{{--                                    </th>--}}
                                    <th>
                                        {{ trans('cruds.user.fields.user_status') }}
                                    </th>
                                    <th>
                                        {{"Actions"}}
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($user->profile->profile_image)
                                                <a href="{{ route('admin.profile.show', $user->profile->user_id) }}" target="_blank">
                                                    <img src="{{ $user->profile->profile_image }}" width="60px"
                                                         height="60px" style="border-radius: 50%;">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
{{--                                        <td>--}}
{{--                                            {{ $user->email_verified_at ?? '' }}--}}
{{--                                        </td>--}}
                                        <td>
                                            @foreach($user->roles as $key => $item)
                                                <span class="label label-info label-many">{{ $item->title }}</span>
                                            @endforeach
                                        </td>

{{--                                        <td>--}}
{{--                                            {{ App\User::GENDER_RADIO[$user->gender] ?? '' }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $user->address ?? '' }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($user->status == true)--}}
{{--                                                {{ "Active" }}--}}
{{--                                            @else {{"Inactive"}}--}}
{{--                                            @endif--}}

{{--                                        </td>--}}
                                        <td>
                                            @if($user->status==1)
                                                <b style="color:green"> Enable</b>
                                            @else
                                                <b style="color:red">  Disabled</b>
                                            @endif
                                            @can('update_user_status')
                                                    <br>
                                                    <button id="showSelectDiv{{$user->id}}"
                                                            class="bbtn btn-dark">
                                                        Change status
                                                    </button>
                                                    <div class="btn btn-xs" id="selectDiv{{$user->id}}">
                                                        <input type="hidden" id="userID{{$user->id}}" value="{{$user->id}}">
                                                        <select class="bootstrap-select" id="loginStatus{{$user->id}}">
                                                            <option value="" selected >select a option</option>
                                                            <option value="1">Enable</option>
                                                            <option value="0">Disabled</option>
                                                        </select>
                                                    </div>
                                            @endcan
                                        </td>

                                        <td>
                                            @can('user_show')
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('admin.users.show', $user->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('user_edit')
                                                <a class="btn btn-xs btn-info"
                                                   href="{{ route('admin.users.edit', $user->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('user_delete')
                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                           value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>

        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                @can('user_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.users.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

        $(document).ready(function(){

            @foreach($users as $user)
            $("#selectDiv{{$user->id}}").hide();
            $("#showSelectDiv{{$user->id}}").click(function(){
                $("#selectDiv{{$user->id}}").show();
            });
            $("#loginStatus{{$user->id}}").change(function(){
                var status = $("#loginStatus{{$user->id}}").val();
                var userID = $("#userID{{$user->id}}").val();
                // alert("user Id" + userID + "Status " + status);
                if(status==""){
                    alert("please select an option");
                }else{
                    // alert("please select");
                    $.ajax({
                        headers: {'x-csrf-token': _token},
                        url: '{{ route("admin.users.banUser")}}',
                        {{--url: '{{url("/admin/users/banUser")}}',--}}
                        data: 'status=' + status + '&userID=' + userID,
                        type: 'get',
                        success:function(response){
                            console.log(response);
                        }
                    })
                        .done(function () {
                            location.reload()
                        })
                }

            });
            @endforeach
        });

    </script>
@endsection
