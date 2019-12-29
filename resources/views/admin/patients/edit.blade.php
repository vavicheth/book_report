@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.patients.update", [$patient->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="hn">{{ trans('cruds.patient.fields.hn') }}</label>
                <input class="form-control {{ $errors->has('hn') ? 'is-invalid' : '' }}" type="text" name="hn" id="hn" value="{{ old('hn', $patient->hn) }}">
                @if($errors->has('hn'))
                    <span class="text-danger">{{ $errors->first('hn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.hn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nup">{{ trans('cruds.patient.fields.nup') }}</label>
                <input class="form-control {{ $errors->has('nup') ? 'is-invalid' : '' }}" type="text" name="nup" id="nup" value="{{ old('nup', $patient->nup) }}">
                @if($errors->has('nup'))
                    <span class="text-danger">{{ $errors->first('nup') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.nup_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.patient.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $patient->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_kh">{{ trans('cruds.patient.fields.name_kh') }}</label>
                <input class="form-control {{ $errors->has('name_kh') ? 'is-invalid' : '' }}" type="text" name="name_kh" id="name_kh" value="{{ old('name_kh', $patient->name_kh) }}" required>
                @if($errors->has('name_kh'))
                    <span class="text-danger">{{ $errors->first('name_kh') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.name_kh_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.patient.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $patient->age) }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.patient.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Patient::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $patient->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.patient.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $patient->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.patient.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $patient->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.patient.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $patient->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.patient.fields.description_helper') }}</span>
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