@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ipd.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ipds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.id') }}
                        </th>
                        <td>
                            {{ $ipd->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            HN
                        </th>
                        <td>
                            {{ $ipd->patient->hn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NUP
                        </th>
                        <td>
                            {{ $ipd->patient->nup ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ឈ្មោះអ្នកជំងឺ
                        </th>
                        <td>
                            {{ $ipd->patient->name_kh ?? '' }}
                        </td>
                    </tr>

{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.ipd.fields.guardian') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $ipd->guardian }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.age_range') }}
                        </th>
                        <td>
                            {{ App\Ipd::AGE_RANGE_SELECT[$ipd->age_range] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ភេទ
                        </th>
                        <td>
                            {{ $ipd->patient->gender = '1' ? 'ប្រុស(8)' : 'ស្រី(9)' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            អាសយដ្ឋាន និងលេខទូរស័ព្ទ
                        </th>
                        <td>
                            {{ $ipd->patient->address ?? '' }} {{ $ipd->patient->phone ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.transfer_from') }}
                        </th>
                        <td>
                            {{ $ipd->transfer_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.diag_admit') }}
                        </th>
                        <td>
                            {{ $ipd->diag_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.date_start_sick') }}
                        </th>
                        <td>
                            {{ $ipd->date_start_sick }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.date_admit') }}
                        </th>
                        <td>
                            {{ $ipd->date_admit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.paraclinic') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $ipd->paraclinic ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.date_discharged') }}
                        </th>
                        <td>
                            {{ $ipd->date_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.diag_discharged') }}
                        </th>
                        <td>
                            {{ $ipd->diag_discharged }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.mother_dead') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $ipd->mother_dead ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.discharged_form') }}
                        </th>
                        <td>
                            {{ App\Ipd::DISCHARGED_FORM_SELECT[$ipd->discharged_form] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.cause_dead') }}
                        </th>
                        <td>
                            {{ $ipd->cause_dead }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.discharged_condition') }}
                        </th>
                        <td>
                            {{ $ipd->discharged_condition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.day_stay') }}
                        </th>
                        <td>
                            {{ $ipd->day_stay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Ipd::PAYMENT_TYPE_SELECT[$ipd->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ipd.fields.note') }}
                        </th>
                        <td>
                            {{ $ipd->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ipds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection