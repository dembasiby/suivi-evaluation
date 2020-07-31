@extends('layouts.admin')
@section('content')
@can('coordonnateur_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.coordonnateurs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.coordonnateur.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.coordonnateur.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Coordonnateur">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.prenom') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coordonnateurs as $key => $coordonnateur)
                        <tr data-entry-id="{{ $coordonnateur->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $coordonnateur->id ?? '' }}
                            </td>
                            <td>
                                {{ $coordonnateur->description ?? '' }}
                            </td>
                            <td>
                                {{ $coordonnateur->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $coordonnateur->user->prenom ?? '' }}
                            </td>
                            <td>
                                @can('coordonnateur_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.coordonnateurs.show', $coordonnateur->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('coordonnateur_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.coordonnateurs.edit', $coordonnateur->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('coordonnateur_delete')
                                    <form action="{{ route('admin.coordonnateurs.destroy', $coordonnateur->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('coordonnateur_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.coordonnateurs.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Coordonnateur:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection