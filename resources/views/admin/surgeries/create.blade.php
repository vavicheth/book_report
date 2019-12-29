@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.surgery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.surgeries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="patient_id">{{ trans('cruds.surgery.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patients as $id => $patient)
                        <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $patient }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_id'))
                    <span class="text-danger">{{ $errors->first('patient_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guardian">{{ trans('cruds.surgery.fields.guardian') }}</label>
                <input class="form-control {{ $errors->has('guardian') ? 'is-invalid' : '' }}" type="text" name="guardian" id="guardian" value="{{ old('guardian', '') }}">
                @if($errors->has('guardian'))
                    <span class="text-danger">{{ $errors->first('guardian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.guardian_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.surgery.fields.age_range') }}</label>
                <select class="form-control {{ $errors->has('age_range') ? 'is-invalid' : '' }}" name="age_range" id="age_range">
                    <option value disabled {{ old('age_range', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Surgery::AGE_RANGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('age_range', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('age_range'))
                    <span class="text-danger">{{ $errors->first('age_range') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.age_range_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transfer_from">{{ trans('cruds.surgery.fields.transfer_from') }}</label>
                <input class="form-control {{ $errors->has('transfer_from') ? 'is-invalid' : '' }}" type="text" name="transfer_from" id="transfer_from" value="{{ old('transfer_from', '') }}">
                @if($errors->has('transfer_from'))
                    <span class="text-danger">{{ $errors->first('transfer_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.transfer_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_admit">{{ trans('cruds.surgery.fields.date_admit') }}</label>
                <input class="form-control datetime {{ $errors->has('date_admit') ? 'is-invalid' : '' }}" type="text" name="date_admit" id="date_admit" value="{{ old('date_admit') }}">
                @if($errors->has('date_admit'))
                    <span class="text-danger">{{ $errors->first('date_admit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.date_admit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diag_admit">{{ trans('cruds.surgery.fields.diag_admit') }}</label>
                <input class="form-control {{ $errors->has('diag_admit') ? 'is-invalid' : '' }}" type="text" name="diag_admit" id="diag_admit" value="{{ old('diag_admit', '') }}">
                @if($errors->has('diag_admit'))
                    <span class="text-danger">{{ $errors->first('diag_admit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.diag_admit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_surgery">{{ trans('cruds.surgery.fields.date_surgery') }}</label>
                <input class="form-control date {{ $errors->has('date_surgery') ? 'is-invalid' : '' }}" type="text" name="date_surgery" id="date_surgery" value="{{ old('date_surgery') }}">
                @if($errors->has('date_surgery'))
                    <span class="text-danger">{{ $errors->first('date_surgery') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.date_surgery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_discharged">{{ trans('cruds.surgery.fields.date_discharged') }}</label>
                <input class="form-control datetime {{ $errors->has('date_discharged') ? 'is-invalid' : '' }}" type="text" name="date_discharged" id="date_discharged" value="{{ old('date_discharged') }}">
                @if($errors->has('date_discharged'))
                    <span class="text-danger">{{ $errors->first('date_discharged') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.date_discharged_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diag_discharged">{{ trans('cruds.surgery.fields.diag_discharged') }}</label>
                <input class="form-control {{ $errors->has('diag_discharged') ? 'is-invalid' : '' }}" type="text" name="diag_discharged" id="diag_discharged" value="{{ old('diag_discharged', '') }}">
                @if($errors->has('diag_discharged'))
                    <span class="text-danger">{{ $errors->first('diag_discharged') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.diag_discharged_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.surgery.fields.discharged_form') }}</label>
                <select class="form-control {{ $errors->has('discharged_form') ? 'is-invalid' : '' }}" name="discharged_form" id="discharged_form">
                    <option value disabled {{ old('discharged_form', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Surgery::DISCHARGED_FORM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discharged_form', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('discharged_form'))
                    <span class="text-danger">{{ $errors->first('discharged_form') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.discharged_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cause_dead">{{ trans('cruds.surgery.fields.cause_dead') }}</label>
                <input class="form-control {{ $errors->has('cause_dead') ? 'is-invalid' : '' }}" type="text" name="cause_dead" id="cause_dead" value="{{ old('cause_dead', '') }}">
                @if($errors->has('cause_dead'))
                    <span class="text-danger">{{ $errors->first('cause_dead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.cause_dead_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('mother_dead') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="mother_dead" value="0">
                    <input class="form-check-input" type="checkbox" name="mother_dead" id="mother_dead" value="1" {{ old('mother_dead', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mother_dead">{{ trans('cruds.surgery.fields.mother_dead') }}</label>
                </div>
                @if($errors->has('mother_dead'))
                    <span class="text-danger">{{ $errors->first('mother_dead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.mother_dead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discharged_condition">{{ trans('cruds.surgery.fields.discharged_condition') }}</label>
                <input class="form-control {{ $errors->has('discharged_condition') ? 'is-invalid' : '' }}" type="text" name="discharged_condition" id="discharged_condition" value="{{ old('discharged_condition', '') }}">
                @if($errors->has('discharged_condition'))
                    <span class="text-danger">{{ $errors->first('discharged_condition') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.discharged_condition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="day_stay">{{ trans('cruds.surgery.fields.day_stay') }}</label>
                <input class="form-control {{ $errors->has('day_stay') ? 'is-invalid' : '' }}" type="number" name="day_stay" id="day_stay" value="{{ old('day_stay') }}" step="1">
                @if($errors->has('day_stay'))
                    <span class="text-danger">{{ $errors->first('day_stay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.day_stay_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.surgery.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type">
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Surgery::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', 'Payant') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.surgery.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.surgery.fields.note_helper') }}</span>
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