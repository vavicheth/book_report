@extends('layouts.admin')
@section('content')
    @can('emergency_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.emergencies.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.emergency.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.emergency.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Emergency">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.id') }}
                    </th>
                    <th>
                        HN (2)
                    </th>
                    <th>
                        NUP
                    </th>
                    <th>
                        ឈ្មោះអ្នកជំងឺ (3)
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.guardian') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.age_range') }}
                    </th>
                    <th>
                        ភេទ
                    </th>
                    <th>
                        អាសយដ្ឋាននិងលេខទូរស័ព្ទ (15)
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.transfer_from') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.diag_admit') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.date_start_sick') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.date_admit') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.paraclinic') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.date_discharged') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.diag_discharged') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.transfer_to_department') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.discharged_form') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.cause_dead') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.mother_dead') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.discharged_condition') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.day_stay') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.payment_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.emergency.fields.note') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                    @can('emergency_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.emergencies.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
                    @endcan

            let dtOverrideGlobals = {
                    buttons: dtButtons,
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    aaSorting: [],
                    ajax: "{{ route('admin.emergencies.index') }}",
                    columns: [
                        { data: 'placeholder', name: 'placeholder' },
                        { data: 'id', name: 'id' },
                        { data: 'patient_hn', name: 'patient.hn' },
                        { data: 'patient_nup', name: 'patient.nup' },
                        { data: 'patient.name_kh', name: 'patient.name_kh' },
                        { data: 'guardian', name: 'guardian' },
                        { data: 'age_range', name: 'age_range' },
                        { data: 'patient.gender', name: 'patient.gender' },
                        { data: 'patient_address', name: 'patient.address' },
                        { data: 'transfer_from', name: 'transfer_from' },
                        { data: 'diag_admit', name: 'diag_admit' },
                        { data: 'date_start_sick', name: 'date_start_sick' },
                        { data: 'date_admit', name: 'date_admit' },
                        { data: 'paraclinic', name: 'paraclinic' },
                        { data: 'date_discharged', name: 'date_discharged' },
                        { data: 'diag_discharged', name: 'diag_discharged' },
                        { data: 'transfer_to_department', name: 'transfer_to_department' },
                        { data: 'discharged_form', name: 'discharged_form' },
                        { data: 'cause_dead', name: 'cause_dead' },
                        { data: 'mother_dead', name: 'mother_dead' },
                        { data: 'discharged_condition', name: 'discharged_condition' },
                        { data: 'day_stay', name: 'day_stay' },
                        { data: 'payment_type', name: 'payment_type' },
                        { data: 'note', name: 'note' },
                        { data: 'actions', name: '{{ trans('global.actions') }}' }
                    ],
                    order: [[ 1, 'desc' ]],
                    pageLength: 10,
                };
            $('.datatable-Emergency').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });

    </script>
@endsection