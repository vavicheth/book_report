@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.emergency.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.emergencies.update", [$emergency->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="patient_id">{{ trans('cruds.emergency.fields.patient') }}</label>
                <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patients as $id => $patient)
                        <option value="{{ $id }}" {{ ($emergency->patient ? $emergency->patient->id : old('patient_id')) == $id ? 'selected' : '' }}>{{ $patient }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_id'))
                    <span class="text-danger">{{ $errors->first('patient_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.patient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guardian">{{ trans('cruds.emergency.fields.guardian') }}</label>
                <input class="form-control {{ $errors->has('guardian') ? 'is-invalid' : '' }}" type="text" name="guardian" id="guardian" value="{{ old('guardian', $emergency->guardian) }}">
                @if($errors->has('guardian'))
                    <span class="text-danger">{{ $errors->first('guardian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.guardian_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.emergency.fields.age_range') }}</label>
                <select class="form-control {{ $errors->has('age_range') ? 'is-invalid' : '' }}" name="age_range" id="age_range">
                    <option value disabled {{ old('age_range', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Emergency::AGE_RANGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('age_range', $emergency->age_range) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('age_range'))
                    <span class="text-danger">{{ $errors->first('age_range') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.age_range_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transfer_from">{{ trans('cruds.emergency.fields.transfer_from') }}</label>
                <input class="form-control {{ $errors->has('transfer_from') ? 'is-invalid' : '' }}" type="text" name="transfer_from" id="transfer_from" value="{{ old('transfer_from', $emergency->transfer_from) }}">
                @if($errors->has('transfer_from'))
                    <span class="text-danger">{{ $errors->first('transfer_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.transfer_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diag_admit">{{ trans('cruds.emergency.fields.diag_admit') }}</label>
                <input class="form-control {{ $errors->has('diag_admit') ? 'is-invalid' : '' }}" type="text" name="diag_admit" id="diag_admit" value="{{ old('diag_admit', $emergency->diag_admit) }}">
                @if($errors->has('diag_admit'))
                    <span class="text-danger">{{ $errors->first('diag_admit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.diag_admit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_start_sick">{{ trans('cruds.emergency.fields.date_start_sick') }}</label>
                <input class="form-control date {{ $errors->has('date_start_sick') ? 'is-invalid' : '' }}" type="text" name="date_start_sick" id="date_start_sick" value="{{ old('date_start_sick', $emergency->date_start_sick) }}">
                @if($errors->has('date_start_sick'))
                    <span class="text-danger">{{ $errors->first('date_start_sick') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.date_start_sick_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_admit">{{ trans('cruds.emergency.fields.date_admit') }}</label>
                <input class="form-control datetime {{ $errors->has('date_admit') ? 'is-invalid' : '' }}" type="text" name="date_admit" id="date_admit" value="{{ old('date_admit', $emergency->date_admit) }}">
                @if($errors->has('date_admit'))
                    <span class="text-danger">{{ $errors->first('date_admit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.date_admit_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('paraclinic') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="paraclinic" value="0">
                    <input class="form-check-input" type="checkbox" name="paraclinic" id="paraclinic" value="1" {{ $emergency->paraclinic || old('paraclinic', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="paraclinic">{{ trans('cruds.emergency.fields.paraclinic') }}</label>
                </div>
                @if($errors->has('paraclinic'))
                    <span class="text-danger">{{ $errors->first('paraclinic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.paraclinic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_discharged">{{ trans('cruds.emergency.fields.date_discharged') }}</label>
                <input class="form-control datetime {{ $errors->has('date_discharged') ? 'is-invalid' : '' }}" type="text" name="date_discharged" id="date_discharged" value="{{ old('date_discharged', $emergency->date_discharged) }}">
                @if($errors->has('date_discharged'))
                    <span class="text-danger">{{ $errors->first('date_discharged') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.date_discharged_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diag_discharged">{{ trans('cruds.emergency.fields.diag_discharged') }}</label>
                <input class="form-control {{ $errors->has('diag_discharged') ? 'is-invalid' : '' }}" type="text" name="diag_discharged" id="diag_discharged" value="{{ old('diag_discharged', $emergency->diag_discharged) }}">
                @if($errors->has('diag_discharged'))
                    <span class="text-danger">{{ $errors->first('diag_discharged') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.diag_discharged_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transfer_to_department">{{ trans('cruds.emergency.fields.transfer_to_department') }}</label>
                <input class="form-control {{ $errors->has('transfer_to_department') ? 'is-invalid' : '' }}" type="text" name="transfer_to_department" id="transfer_to_department" value="{{ old('transfer_to_department', $emergency->transfer_to_department) }}">
                @if($errors->has('transfer_to_department'))
                    <span class="text-danger">{{ $errors->first('transfer_to_department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.transfer_to_department_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.emergency.fields.discharged_form') }}</label>
                <select class="form-control {{ $errors->has('discharged_form') ? 'is-invalid' : '' }}" name="discharged_form" id="discharged_form">
                    <option value disabled {{ old('discharged_form', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Emergency::DISCHARGED_FORM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discharged_form', $emergency->discharged_form) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('discharged_form'))
                    <span class="text-danger">{{ $errors->first('discharged_form') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.discharged_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cause_dead">{{ trans('cruds.emergency.fields.cause_dead') }}</label>
                <input class="form-control {{ $errors->has('cause_dead') ? 'is-invalid' : '' }}" type="text" name="cause_dead" id="cause_dead" value="{{ old('cause_dead', $emergency->cause_dead) }}">
                @if($errors->has('cause_dead'))
                    <span class="text-danger">{{ $errors->first('cause_dead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.cause_dead_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('mother_dead') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="mother_dead" value="0">
                    <input class="form-check-input" type="checkbox" name="mother_dead" id="mother_dead" value="1" {{ $emergency->mother_dead || old('mother_dead', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mother_dead">{{ trans('cruds.emergency.fields.mother_dead') }}</label>
                </div>
                @if($errors->has('mother_dead'))
                    <span class="text-danger">{{ $errors->first('mother_dead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.mother_dead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discharged_condition">{{ trans('cruds.emergency.fields.discharged_condition') }}</label>
                <input class="form-control {{ $errors->has('discharged_condition') ? 'is-invalid' : '' }}" type="text" name="discharged_condition" id="discharged_condition" value="{{ old('discharged_condition', $emergency->discharged_condition) }}">
                @if($errors->has('discharged_condition'))
                    <span class="text-danger">{{ $errors->first('discharged_condition') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.discharged_condition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="day_stay">{{ trans('cruds.emergency.fields.day_stay') }}</label>
                <input class="form-control {{ $errors->has('day_stay') ? 'is-invalid' : '' }}" type="number" name="day_stay" id="day_stay" value="{{ old('day_stay', $emergency->day_stay) }}" step="1">
                @if($errors->has('day_stay'))
                    <span class="text-danger">{{ $errors->first('day_stay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.day_stay_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.emergency.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type">
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Emergency::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $emergency->payment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.emergency.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $emergency->note) }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emergency.fields.note_helper') }}</span>
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