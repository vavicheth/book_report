<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIpdRequest;
use App\Http\Requests\StoreIpdRequest;
use App\Http\Requests\UpdateIpdRequest;
use App\Ipd;
use App\Patient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IpdController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if(Auth::user()->getIsAdminAttribute()){
                $query = Ipd::with(['patient', 'department', 'creator'])->select(sprintf('%s.*', (new Ipd)->table));
            }else{
                $query = Ipd::where('department_id',Auth::user()->department_id)->with(['patient', 'department', 'creator'])->select(sprintf('%s.*', (new Ipd)->table));
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ipd_show';
                $editGate      = 'ipd_edit';
                $deleteGate    = 'ipd_delete';
                $crudRoutePart = 'ipds';

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
            $table->addColumn('patient_address', function ($row) {
                $address=$row->patient ? $row->patient->address : '';
                $phone=$row->patient ? $row->patient->phone : '';
                return $address . " ". $phone;
            });
            $table->editColumn('patient.name_kh', function ($row) {
                return $row->patient ? (is_string($row->patient) ? $row->patient : $row->patient->name_kh) : '';
            });
            $table->addColumn('patient.gender', function ($row) {
                $gender=$row->patient ? $row->patient->gender : '';
                return $gender='1'? 'ប្រុស(8)' : 'ស្រី(9)';
            });
            $table->editColumn('guardian', function ($row) {
                return $row->guardian ? $row->guardian : "";
            });
            $table->editColumn('age_range', function ($row) {
                return $row->age_range ? Ipd::AGE_RANGE_SELECT[$row->age_range] : '';
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
            $table->editColumn('mother_dead', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->mother_dead ? 'checked' : null) . '>';
            });
            $table->editColumn('discharged_form', function ($row) {
                return $row->discharged_form ? Ipd::DISCHARGED_FORM_SELECT[$row->discharged_form] : '';
            });
            $table->editColumn('cause_dead', function ($row) {
                return $row->cause_dead ? $row->cause_dead : "";
            });
            $table->editColumn('discharged_condition', function ($row) {
                return $row->discharged_condition ? $row->discharged_condition : "";
            });
            $table->editColumn('day_stay', function ($row) {
                return $row->day_stay ? $row->day_stay : "";
            });
            $table->editColumn('payment_type', function ($row) {
                return $row->payment_type ? Ipd::PAYMENT_TYPE_SELECT[$row->payment_type] : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'patient', 'paraclinic', 'mother_dead']);

            return $table->make(true);
        }

        return view('admin.ipds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ipd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ipds.create', compact('patients'));
    }

    public function store(StoreIpdRequest $request)
    {
        $request->request->add(["creator_id"=>Auth::id(),"department_id"=>Auth::user()->department->id]);
        $ipd = Ipd::create($request->all());

        return redirect()->route('admin.ipds.index');
    }

    public function edit(Ipd $ipd)
    {
        abort_if(Gate::denies('ipd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::all()->pluck('hn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ipd->load('patient', 'department', 'creator');

        return view('admin.ipds.edit', compact('patients', 'ipd'));
    }

    public function update(UpdateIpdRequest $request, Ipd $ipd)
    {
        $ipd->update($request->all());

        return redirect()->route('admin.ipds.index');
    }

    public function show(Ipd $ipd)
    {
        abort_if(Gate::denies('ipd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ipd->load('patient', 'department', 'creator');

        return view('admin.ipds.show', compact('ipd'));
    }

    public function destroy(Ipd $ipd)
    {
        abort_if(Gate::denies('ipd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ipd->delete();

        return back();
    }

    public function massDestroy(MassDestroyIpdRequest $request)
    {
        Ipd::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
