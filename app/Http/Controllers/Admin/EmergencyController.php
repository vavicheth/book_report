<?php

namespace App\Http\Controllers\Admin;

use App\Emergency;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmergencyRequest;
use App\Http\Requests\StoreEmergencyRequest;
use App\Http\Requests\UpdateEmergencyRequest;
use App\Patient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmergencyController extends Controller
{
    public function index(Request $request)
    {
//        abort_if(Gate::denies('emergency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            /* Admin can view all fields */
            if(Auth::user()->getIsAdminAttribute()){
                $query = Emergency::with(['patient', 'department', 'creator'])->select(sprintf('%s.*', (new Emergency)->table));
            }else{
                $query = Emergency::where('department_id',Auth::user()->department_id)->with(['patient', 'department', 'creator'])->select(sprintf('%s.*', (new Emergency)->table));
            }

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'emergency_show';
                $editGate      = 'emergency_edit';
                $deleteGate    = 'emergency_delete';
                $crudRoutePart = 'emergencies';

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
            $table->addColumn('patient_nup', function ($row) {
                return $row->patient ? $row->patient->nup : '';
            });

            $table->editColumn('patient.name_kh', function ($row) {
                return $row->patient ? (is_string($row->patient) ? $row->patient : $row->patient->name_kh) : '';
            });
            $table->addColumn('patient.gender', function ($row) {
                $gender=$row->patient ? $row->patient->gender : '';
                return $gender='1'? 'ប្រុស(13)' : 'ស្រី(14)';
            });
            $table->editColumn('guardian', function ($row) {
                return $row->guardian ? $row->guardian : "";
            });
            $table->editColumn('age_range', function ($row) {
                return $row->age_range ? Emergency::AGE_RANGE_SELECT[$row->age_range] : '';
            });
            $table->addColumn('patient_address', function ($row) {
                $address=$row->patient ? $row->patient->address : '';
                $phone=$row->patient ? $row->patient->phone : '';
                return $address . " ". $phone;
            });
            $table->editColumn('transfer_from', function ($row) {
                return $row->transfer_from ? $row->transfer_from : "";
            });
            $table->editColumn('diag_admit', function ($row) {
                return $row->diag_admit ? $row->diag_admit : "";
            });

            $table->editColumn('paraclinic', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->paraclinic ? 'checked' : null) . '>';
            });

            $table->editColumn('diag_discharged', function ($row) {
                return $row->diag_discharged ? $row->diag_discharged : "";
            });
            $table->editColumn('transfer_to_department', function ($row) {
                return $row->transfer_to_department ? $row->transfer_to_department : "";
            });
            $table->editColumn('discharged_form', function ($row) {
                return $row->discharged_form ? Emergency::DISCHARGED_FORM_SELECT[$row->discharged_form] : '';
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
                return $row->payment_type ? Emergency::PAYMENT_TYPE_SELECT[$row->payment_type] : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'patient', 'paraclinic', 'mother_dead']);

            return $table->make(true);
        }

        return view('admin.emergencies.index');
    }

    public function create()
    {

        abort_if(Gate::denies('emergency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.emergencies.create', compact('patients'));
    }

    public function store(StoreEmergencyRequest $request)
    {
        $request->request->add(["creator_id"=>Auth::id(),"department_id"=>Auth::user()->department->id]);
        $emergency = Emergency::create($request->all());

        return redirect()->route('admin.emergencies.index');
    }

    public function edit(Emergency $emergency)
    {
        abort_if(Gate::denies('emergency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emergency->load('patient', 'department', 'creator');

        return view('admin.emergencies.edit', compact('patients', 'emergency'));
    }

    public function update(UpdateEmergencyRequest $request, Emergency $emergency)
    {
        $emergency->update($request->all());

        return redirect()->route('admin.emergencies.index');
    }

    public function show(Emergency $emergency)
    {
        abort_if(Gate::denies('emergency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emergency->load('patient', 'department', 'creator');

        return view('admin.emergencies.show', compact('emergency'));
    }

    public function destroy(Emergency $emergency)
    {
        abort_if(Gate::denies('emergency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emergency->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmergencyRequest $request)
    {
        Emergency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
