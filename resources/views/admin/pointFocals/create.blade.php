@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pointFocal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.point-focals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="descritpion">{{ trans('cruds.pointFocal.fields.descritpion') }}</label>
                <input class="form-control {{ $errors->has('descritpion') ? 'is-invalid' : '' }}" type="text" name="descritpion" id="descritpion" value="{{ old('descritpion', '') }}">
                @if($errors->has('descritpion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descritpion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointFocal.fields.descritpion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.pointFocal.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.pointFocal.fields.user_helper') }}</span>
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