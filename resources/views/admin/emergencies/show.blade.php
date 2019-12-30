@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.emergency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emergencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.id') }}
                        </th>
                        <td>
                            {{ $emergency->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            HN
                        </th>
                        <td>
                            {{ $emergency->patient->hn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NUP
                        </th>
                        <td>
                            {{ $emergency->patient->nup ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ឈ្មោះអ្នកជំងឺ
                        </th>
                        <td>
                            {{ $emergency->patient->name_kh ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.guardian') }}
                        </th>
                        <td>
                            {{ $emergency->guardian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.age_range') }}
                        </th>
                        <td>
                            {{ App\Emergency::AGE_RANGE_SELECT[$emergency->age_range] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ភេទ
                        </th>
                        <td>
                            {{ $emergency->patient->gender = '1' ? 'ប្រុស(13)' : 'ស្រី(14)' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            អាសយដ្ឋាន និងលេខទូរស័ព្ទ (15)
                        </th>
                        <td>
                            {{ $emergency->patient->address ?? '' }} {{ $emergency->patient->phone ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.transfer_from') }}
                        </th>
                        <td>
                            {{ $emergency->transfer_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.diag_admit') }}
                        </th>
                        <td>
                            {{ $emergency->diag_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.date_start_sick') }}
                        </th>
                        <td>
                            {{ $emergency->date_start_sick }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.date_admit') }}
                        </th>
                        <td>
                            {{ $emergency->date_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.paraclinic') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $emergency->paraclinic ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.date_discharged') }}
                        </th>
                        <td>
                            {{ $emergency->date_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.diag_discharged') }}
                        </th>
                        <td>
                            {{ $emergency->diag_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.transfer_to_department') }}
                        </th>
                        <td>
                            {{ $emergency->transfer_to_department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.discharged_form') }}
                        </th>
                        <td>
                            {{ App\Emergency::DISCHARGED_FORM_SELECT[$emergency->discharged_form] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.cause_dead') }}
                        </th>
                        <td>
                            {{ $emergency->cause_dead }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.mother_dead') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $emergency->mother_dead ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.discharged_condition') }}
                        </th>
                        <td>
                            {{ $emergency->discharged_condition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.day_stay') }}
                        </th>
                        <td>
                            {{ $emergency->day_stay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Emergency::PAYMENT_TYPE_SELECT[$emergency->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emergency.fields.note') }}
                        </th>
                        <td>
                            {{ $emergency->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emergencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection