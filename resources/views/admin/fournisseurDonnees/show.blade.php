@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fournisseurDonnee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fournisseur-donnees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fournisseurDonnee.fields.id') }}
                        </th>
                        <td>
                            {{ $fournisseurDonnee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fournisseurDonnee.fields.user') }}
                        </th>
                        <td>
                            {{ $fournisseurDonnee->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fournisseurDonnee.fields.organisation') }}
                        </th>
                        <td>
                            {{ $fournisseurDonnee->organisation->sigle ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fournisseurDonnee.fields.point_focal') }}
                        </th>
                        <td>
                            {{ $fournisseurDonnee->point_focal->descritpion ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fournisseur-donnees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection