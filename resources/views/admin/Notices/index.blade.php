@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('notice_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.notice.create") }}">
                        {{ trans('global.add') }} {{ trans('cruds.notice.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.notice.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Notice">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.notice.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notice.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notice.fields.description') }}
                                    </th>

                                    <th>
                                        {{ "Created By" }}
                                    </th>

                                    <th>
                                        {{ "Status" }}
                                    </th>

                                    <th>
                                        {{trans('global.actions')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notices as $key => $notice)
                                    <tr data-entry-id="{{ $notice->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $notice->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $notice->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $notice->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ 'Admin' }}
                                        </td>
                                        <td>
                                            {{ ''}}
                                        </td>
                                        <td>
                                            @can('notice_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.notice.show', $notice->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('notice_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.notice.edit', $notice->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('notice_delete')
                                                <form action="{{ route('admin.notice.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
                @can('notice_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
{{--                url: "{{ route('admin.projects.massDestroy') }}",--}}
                url: "{{ route('admin.notices.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
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
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Notice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>

@endsection
