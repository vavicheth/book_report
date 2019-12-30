@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.surgery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.surgeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.id') }}
                        </th>
                        <td>
                            {{ $surgery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            HN
                        </th>
                        <td>
                            {{ $surgery->patient->hn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NUP
                        </th>
                        <td>
                            {{ $surgery->patient->nup ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ឈ្មោះអ្នកជំងឺ
                        </th>
                        <td>
                            {{ $surgery->patient->name_kh ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.guardian') }}
                        </th>
                        <td>
                            {{ $surgery->guardian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.age_range') }}
                        </th>
                        <td>
                            {{ App\Surgery::AGE_RANGE_SELECT[$surgery->age_range] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ភេទ
                        </th>
                        <td>
                            {{ $surgery->patient->gender = '1' ? 'ប្រុស(13)' : 'ស្រី(14)' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            អាសយដ្ឋាន និងលេខទូរស័ព្ទ (15)
                        </th>
                        <td>
                            {{ $surgery->patient->address ?? '' }} {{ $surgery->patient->phone ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.transfer_from') }}
                        </th>
                        <td>
                            {{ $surgery->transfer_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.date_admit') }}
                        </th>
                        <td>
                            {{ $surgery->date_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.diag_admit') }}
                        </th>
                        <td>
                            {{ $surgery->diag_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.date_surgery') }}
                        </th>
                        <td>
                            {{ $surgery->date_surgery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.date_discharged') }}
                        </th>
                        <td>
                            {{ $surgery->date_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.diag_discharged') }}
                        </th>
                        <td>
                            {{ $surgery->diag_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.discharged_form') }}
                        </th>
                        <td>
                            {{ App\Surgery::DISCHARGED_FORM_SELECT[$surgery->discharged_form] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.cause_dead') }}
                        </th>
                        <td>
                            {{ $surgery->cause_dead }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.mother_dead') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $surgery->mother_dead ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.discharged_condition') }}
                        </th>
                        <td>
                            {{ $surgery->discharged_condition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.day_stay') }}
                        </th>
                        <td>
                            {{ $surgery->day_stay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Surgery::PAYMENT_TYPE_SELECT[$surgery->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.surgery.fields.note') }}
                        </th>
                        <td>
                            {{ $surgery->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.surgeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection