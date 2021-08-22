@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.supporter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supporters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email_id">{{ trans('cruds.supporter.fields.email') }}</label>
                <select class="form-control select2 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email_id" id="email_id">
                    @foreach($emails as $id => $entry)
                        <option value="{{ $id }}" {{ old('email_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_id">{{ trans('cruds.supporter.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name_id" id="name_id">
                    @foreach($names as $id => $entry)
                        <option value="{{ $id }}" {{ old('name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.name_helper') }}</span>
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