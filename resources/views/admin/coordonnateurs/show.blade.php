@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.coordonnateur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coordonnateurs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.id') }}
                        </th>
                        <td>
                            {{ $coordonnateur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.description') }}
                        </th>
                        <td>
                            {{ $coordonnateur->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coordonnateur.fields.user') }}
                        </th>
                        <td>
                            {{ $coordonnateur->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coordonnateurs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection