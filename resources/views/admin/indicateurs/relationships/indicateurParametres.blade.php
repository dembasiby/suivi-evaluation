@can('parametre_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.parametres.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.parametre.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.parametre.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-indicateurParametres">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.parametre.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.parametre.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.parametre.fields.indicateur') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parametres as $key => $parametre)
                        <tr data-entry-id="{{ $parametre->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $parametre->id ?? '' }}
                            </td>
                            <td>
                                {{ $parametre->description ?? '' }}
                            </td>
                            <td>
                                {{ $parametre->indicateur->description ?? '' }}
                            </td>
                            <td>
                                @can('parametre_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.parametres.show', $parametre->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('parametre_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.parametres.edit', $parametre->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('parametre_delete')
                                    <form action="{{ route('admin.parametres.destroy', $parametre->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('parametre_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.parametres.massDestroy') }}",
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
  let table = $('.datatable-indicateurParametres:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection