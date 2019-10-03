@extends('layouts.admin')
@section('content')
<div class="content">
    @can('bank_account_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.bank-accounts.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.bankAccount.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.bankAccount.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BankAccount">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_opening_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.balance') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankAccount.fields.account_number') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bankAccounts as $key => $bankAccount)
                                    <tr data-entry-id="{{ $bankAccount->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $bankAccount->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankAccount->account_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankAccount->account_type->title ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($bankAccount->users as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $bankAccount->bank_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankAccount->account_opening_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankAccount->balance ?? '' }}
                                        </td>
                                        <td>
                                            {{ $bankAccount->account_number ?? '' }}
                                        </td>
                                        <td>
                                            @can('bank_account_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.bank-accounts.show', $bankAccount->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('bank_account_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.bank-accounts.edit', $bankAccount->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('bank_account_delete')
                                                <form action="{{ route('admin.bank-accounts.destroy', $bankAccount->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bank_account_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bank-accounts.massDestroy') }}",
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
  $('.datatable-BankAccount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection