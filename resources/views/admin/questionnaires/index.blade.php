@extends('layouts.admin')
@section('content')
@can('questionnaire_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.questionnaires.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.questionnaire.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.questionnaire.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Questionnaire">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.annee') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.trimestre') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.questionnaire.fields.organisation') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionnaires as $key => $questionnaire)
                        <tr data-entry-id="{{ $questionnaire->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $questionnaire->id ?? '' }}
                            </td>
                            <td>
                                {{ $questionnaire->description ?? '' }}
                            </td>
                            <td>
                                {{ $questionnaire->annee ?? '' }}
                            </td>
                            <td>
                                {{ $questionnaire->trimestre ?? '' }}
                            </td>
                            <td>
                                @foreach($questionnaire->questions as $key => $item)
                                    <span class="badge badge-info">{{ $item->description }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $questionnaire->organisation->sigle ?? '' }}
                            </td>
                            <td>
                                @can('questionnaire_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.questionnaires.show', $questionnaire->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('questionnaire_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.questionnaires.edit', $questionnaire->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('questionnaire_delete')
                                    <form action="{{ route('admin.questionnaires.destroy', $questionnaire->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('questionnaire_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.questionnaires.massDestroy') }}",
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
  let table = $('.datatable-Questionnaire:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection