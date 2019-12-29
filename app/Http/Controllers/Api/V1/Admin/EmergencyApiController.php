<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Emergency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmergencyRequest;
use App\Http\Requests\UpdateEmergencyRequest;
use App\Http\Resources\Admin\EmergencyResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmergencyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('emergency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmergencyResource(Emergency::with(['patient', 'department', 'creator'])->get());
    }

    public function store(StoreEmergencyRequest $request)
    {
        $emergency = Emergency::create($request->all());

        return (new EmergencyResource($emergency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Emergency $emergency)
    {
        abort_if(Gate::denies('emergency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmergencyResource($emergency->load(['patient', 'department', 'creator']));
    }

    public function update(UpdateEmergencyRequest $request, Emergency $emergency)
    {
        $emergency->update($request->all());

        return (new EmergencyResource($emergency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Emergency $emergency)
    {
        abort_if(Gate::denies('emergency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emergency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
