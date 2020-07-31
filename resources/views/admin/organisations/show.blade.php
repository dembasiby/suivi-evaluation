@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organisation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organisations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.id') }}
                        </th>
                        <td>
                            {{ $organisation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.nom') }}
                        </th>
                        <td>
                            {{ $organisation->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.sigle') }}
                        </th>
                        <td>
                            {{ $organisation->sigle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organisations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#organisation_fournisseur_donnees" role="tab" data-toggle="tab">
                {{ trans('cruds.fournisseurDonnee.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="organisation_fournisseur_donnees">
            @includeIf('admin.organisations.relationships.organisationFournisseurDonnees', ['fournisseurDonnees' => $organisation->organisationFournisseurDonnees])
        </div>
    </div>
</div>

@endsection