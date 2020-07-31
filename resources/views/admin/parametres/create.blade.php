@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.parametre.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.parametres.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.parametre.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.parametre.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indicateur_id">{{ trans('cruds.parametre.fields.indicateur') }}</label>
                <select class="form-control select2 {{ $errors->has('indicateur') ? 'is-invalid' : '' }}" name="indicateur_id" id="indicateur_id" required>
                    @foreach($indicateurs as $id => $indicateur)
                        <option value="{{ $id }}" {{ old('indicateur_id') == $id ? 'selected' : '' }}>{{ $indicateur }}</option>
                    @endforeach
                </select>
                @if($errors->has('indicateur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indicateur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.parametre.fields.indicateur_helper') }}</span>
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