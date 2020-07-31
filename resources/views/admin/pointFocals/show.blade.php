@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pointFocal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.point-focals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pointFocal.fields.id') }}
                        </th>
                        <td>
                            {{ $pointFocal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointFocal.fields.descritpion') }}
                        </th>
                        <td>
                            {{ $pointFocal->descritpion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointFocal.fields.user') }}
                        </th>
                        <td>
                            {{ $pointFocal->user->prenom ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.point-focals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection