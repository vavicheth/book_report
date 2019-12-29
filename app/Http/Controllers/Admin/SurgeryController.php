<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySurgeryRequest;
use App\Http\Requests\StoreSurgeryRequest;
use App\Http\Requests\UpdateSurgeryRequest;
use App\Patient;
use App\Surgery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SurgeryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Surgery::with(['patient', 'department', 'creator'])->select(sprintf('%s.*', (new Surgery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'surgery_show';
                $editGate      = 'surgery_edit';
                $deleteGate    = 'surgery_delete';
                $crudRoutePart = 'surgeries';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('patient_hn', function ($row) {
                return $row->patient ? $row->patient->hn : '';
            });

            $table->editColumn('patient.name_kh', function ($row) {
                return $row->patient ? (is_string($row->patient) ? $row->patient : $row->patient->name_kh) : '';
            });
            $table->editColumn('guardian', function ($row) {
                return $row->guardian ? $row->guardian : "";
            });
            $table->editColumn('age_range', function ($row) {
                return $row->age_range ? Surgery::AGE_RANGE_SELECT[$row->age_range] : '';
            });
            $table->editColumn('transfer_from', function ($row) {
                return $row->transfer_from ? $row->transfer_from : "";
            });

            $table->editColumn('diag_admit', function ($row) {
                return $row->diag_admit ? $row->diag_admit : "";
            });

            $table->editColumn('diag_discharged', function ($row) {
                return $row->diag_discharged ? $row->diag_discharged : "";
            });
            $table->editColumn('discharged_form', function ($row) {
                return $row->discharged_form ? Surgery::DISCHARGED_FORM_SELECT[$row->discharged_form] : '';
            });
            $table->editColumn('cause_dead', function ($row) {
                return $row->cause_dead ? $row->cause_dead : "";
            });
            $table->editColumn('mother_dead', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->mother_dead ? 'checked' : null) . '>';
            });
            $table->editColumn('discharged_condition', function ($row) {
                return $row->discharged_condition ? $row->discharged_condition : "";
            });
            $table->editColumn('day_stay', function ($row) {
                return $row->day_stay ? $row->day_stay : "";
            });
            $table->editColumn('payment_type', function ($row) {
                return $row->payment_type ? Surgery::PAYMENT_TYPE_SELECT[$row->payment_type] : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'patient', 'mother_dead']);

            return $table->make(true);
        }

        return view('admin.surgeries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('surgery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.surgeries.create', compact('patients'));
    }

    public function store(StoreSurgeryRequest $request)
    {
        $surgery = Surgery::create($request->all());

        return redirect()->route('admin.surgeries.index');
    }

    public function edit(Surgery $surgery)
    {
        abort_if(Gate::denies('surgery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surgery->load('patient', 'department', 'creator');

        return view('admin.surgeries.edit', compact('patients', 'surgery'));
    }

    public function update(UpdateSurgeryRequest $request, Surgery $surgery)
    {
        $surgery->update($request->all());

        return redirect()->route('admin.surgeries.index');
    }

    public function show(Surgery $surgery)
    {
        abort_if(Gate::denies('surgery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surgery->load('patient', 'department', 'creator');

        return view('admin.surgeries.show', compact('surgery'));
    }

    public function destroy(Surgery $surgery)
    {
        abort_if(Gate::denies('surgery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surgery->delete();

        return back();
    }

    public function massDestroy(MassDestroySurgeryRequest $request)
    {
        Surgery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
