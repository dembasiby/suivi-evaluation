@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fournisseurDonnee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fournisseur-donnees.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fournisseurDonnee.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fournisseurDonnee.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organisation_id">{{ trans('cruds.fournisseurDonnee.fields.organisation') }}</label>
                <select class="form-control select2 {{ $errors->has('organisation') ? 'is-invalid' : '' }}" name="organisation_id" id="organisation_id" required>
                    @foreach($organisations as $id => $organisation)
                        <option value="{{ $id }}" {{ old('organisation_id') == $id ? 'selected' : '' }}>{{ $organisation }}</option>
                    @endforeach
                </select>
                @if($errors->has('organisation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organisation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fournisseurDonnee.fields.organisation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="point_focal_id">{{ trans('cruds.fournisseurDonnee.fields.point_focal') }}</label>
                <select class="form-control select2 {{ $errors->has('point_focal') ? 'is-invalid' : '' }}" name="point_focal_id" id="point_focal_id" required>
                    @foreach($point_focals as $id => $point_focal)
                        <option value="{{ $id }}" {{ old('point_focal_id') == $id ? 'selected' : '' }}>{{ $point_focal }}</option>
                    @endforeach
                </select>
                @if($errors->has('point_focal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point_focal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fournisseurDonnee.fields.point_focal_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection