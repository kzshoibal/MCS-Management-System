@extends('layouts.admin')
@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            Monthly Deposit List
        </h1>
        <ol class="breadcrumb">
            <li ><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Deposit List</a></li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="content">
        @can('project_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.monthly-deposits.create") }}">
                        {{ trans('global.add') }} {{ trans('cruds.monthlyDeposit.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.monthlyDeposit.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.id') }}
                                    </th>

                                    <th>
                                        {{ "Date" }}
                                    </th>

                                    <th>
                                        {{ "Amount (Tk)" }}
                                    </th>
                                    <th>
                                        {{ "Notes" }}
                                    </th>
                                    <th>
                                        {{ "Bank Account Name" }}
                                    </th>
                                    <th>
                                        {{ "Approval Status" }}
                                    </th>
                                    <th>
                                        &nbsp;{{ "Actions" }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id=1;
                                @endphp

                                @foreach($transactioins as $key =>$deposit)
                                    <tr data-entry-id="{{ $deposit->id }}">
                                        <td>


                                        </td>
                                        <td>
                                            {{$id}}
                                            @php
                                                $id++;
                                            @endphp
                                        </td>
                                        <td>
{{--                                            {{ $deposit->date ?? '' }}--}}
                                        </td>
                                        <td>
{{--                                            {{ $deposit->amount ?? '' }}--}}

                                        </td>
                                        <td>
                                            {{ $deposit->description ?? ''}}
                                        </td>
                                        <td>
{{--                                            {{($deposit->bank_account_id ?? '')}}--}}
                                            {{($deposit->bank_account->account_title ?? '')}}

                                        </td>
                                        <td>
{{--                                            @if($deposit->is_approved)--}}
{{--                                                <span class="label label-success label-many">{{ "Approved" }}</span>--}}
{{--                                            @elseif($deposit->is_approved == 0)--}}
{{--                                                <span class="label label-warning label-many" >{{ "Pending" }}</span>--}}
{{--                                            @endif--}}
                                        </td>


                                        <td>
                                            @can('enrole_monthly_deposit_access')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.transaction.show', $deposit->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('enrole_monthly_deposit_access')
                                                @if(!$deposit->is_approved)
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transaction.edit', $deposit->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endif
                                            @endcan

                                            @can('enrole_monthly_deposit_access')
{{--                                                @if(!$deposit->is_approved)--}}
{{--                                                    <form action="{{ route('admin.monthly-deposits.destroy', $deposit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
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
                @can('project_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.projects.massDestroy') }}",
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
            // dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
